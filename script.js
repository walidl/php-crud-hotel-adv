

function getPaganti(){

  $.ajax({

    url: "getPaganti.php",
    method: "GET",
    success: function(data){


      var paganti = JSON.parse(data);
      // console.log(paganti);

      var template = $("#row-template").html();

      var comp = Handlebars.compile(template);

      var tabella = $(".tabella .rows");
      tabella.empty();

      for (var i = 0; i < paganti.length; i++) {

        var row = comp(paganti[i]);

        tabella.append(row);

      }
    },
    error: function(){

      console.log("errore nel recupero paganti");
    }

  })
}

function getAddress(me){

  var id = me.data("id")
  console.log(id);

  $.ajax({

    url: "getAddressById.php",
    method: "POST",
    data: {id: id},
    success: function(data){

      var adrsObj = JSON.parse(data);

      var address = adrsObj[0].address;
      // console.log(address);

      me.find(".address").html(address);

    },
    error: function(){
      console.log("errore recupero indirizzo");
    }
  })
}

function deletePagante(me){

  var id = me.data("id");

  $.ajax({

    url: "deletePaganteById.php",
    method: "POST",
    data: {id: id},
    success: function(){

      me.slideUp(300,getPaganti);
    },
    error: function(){
      console.log("errore recupero indirizzo");
    }
  })

}

function editName(me){

  var id = me.data("id");
  console.log(id);

  var name = prompt("Insert new Name");
  var lastname = prompt("Insert new Lastname");

  var inData = {

    id:id,
    name:name,
    lastname: lastname,
  }

  $.ajax({

    url: "editNameLastname.php",
    method: "POST",
    data: inData,
    success: function(data){

      getPaganti();
    },
    error: function(){
      console.log("errore recupero indirizzo");
    }
  })

}

function init(){

  getPaganti();


  $(".tabella .rows").on("click",".row",function(event){

    if($(event.target).is(".delete")){

      deletePagante($(this));
    }
    else if($(event.target).is(".edit")){

      editName($(this));

    }
    else{
      getAddress($(this));
    }
  })

}

$(document).ready(init);
