
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="stylesheet" href="./public/css/Caveat-Bold.ttf">

</head>
<body style="font-family: IBM Plex Sans; min-height: 800px;">

  <div class="container" style="height: 80px;">

  </div>
  
<div class="container">
  <div class="row">
    <div class="col-sm-1 col-md-1 col-lg-1 col-xl-1 cover-left">
      
    </div>
    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3 ">
        <div id="logo">
              <a href="http://www.haegroup.com/"><img src="http://www.haegroup.com/wp-content/uploads/2014/08/logo-hae-group.png"></a>     
         </div>
         <hr style="width: 80%; text-align: center;">
         <h4 style="text-align: center;"> GuestBook </h4>
         <br> <br>
         <div style="text-align: center;">
              <span >
                  Feel free to leave us a short mesage to tell us what you think to our services
               </span>
               <br> <br>      <!-- Button trigger modal -->
               <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal" onclick="open_post_message()"> Post a Message </button>

                      <!-- Modal -->
                      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"> </h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body" style="text-align: left;">
                                 <form>
                                    <div class="form-group">
                                      <div class="alert alert-success" id="messageSucess" style="display: none;" role="alert">
                                        
                                      </div>
                                      <label for="titleMessage">Title</label>
                                      <input type="text" class="form-control" id="titleMessage" placeholder="Enter a title message">
                                      <span class="error" id = "titleMessageError" > </span>
                                    </div>
                                    <div class="form-group" id = "outherNameHidden">
                                          <label for="outherName">visitor’s Name</label>
                                          <input type="text" class="form-control" id="outherName" value="Jamie Jones" readonly>  
                                          <input type="hidden" class="form-control" id="visitor_id" value="3">                              
                                    </div>
                                    <div class="form-group">
                                      <label for="messageDiscription">Message Discription</label>
                                      <textarea class="form-control" id="messageDiscription" rows="4"></textarea>
                                      <span class="error" id = "DescriptionMessageError" > </span>
                                      <input type="hidden" class="form-control" id="messages_id"> 
                                    </div>
                                  </form>
                                   
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="button" class="btn btn-danger" id="postMessage" onclick="post_message()">Post a Message</button>
                              <button type="button" class="btn btn-primary" id="saveMessage" onclick="edit_message()">Save</button>
                            </div>
                          </div>
                        </div>
                      </div>
         </div>
         <div class="footer-admin">
             <a class="admin-darkbroad" href="#"> Admin Login </a>
         </div>
    </div>
    <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 cover-content">
          <div class="row" id="show-meassage" style="padding: 30px 60px 30px 60px;"> 
      
          </div>
          <div class="row"  style="padding: 30px 60px 30px 60px;"> 
              <div class="row" id="pagination-message">

               </div>  
    
          </div>
    </div>
  </div>
</div>

</body>
</html>

<script language="javascript">
         const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
              confirmButton: 'btn btn-success',
              cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false,
          })
         $(document).ready(function(){

             var page = getQueryVariable("page"); 
             if(page != false) {
               get_list_messages(page);
             } else {
               var page = 1;
               get_list_messages(page);
             }
             
          });
          function open_post_message() {

            $('#exampleModalLabel').html('Post a Message');
            $("#saveMessage").hide();
            $("#postMessage").show();
            $('#outherNameHidden').show();
            $("#titleMessage").val("");
            $("#messageDiscription").val("");
            $("#messageSucess").html(" ");
          }

            function post_message() 
          {
                $.ajax({
                    url : "./messages/postMessage.php",
                    type : "post",
                    dataType:"text",
                    data : {
                       title_message: $('#titleMessage').val(),
                       user_id: $('#visitor_id').val(),
                       description_message: $('#messageDiscription').val(),
                    },
                    success : function (result){

                      var obj = JSON.parse(result);

                      if(obj.message == "Error") {
                          $("#titleMessageError").html(obj.title_messageErr);
                          $("#DescriptionMessageError").html(obj.description_messageErr);
                          $("#messageSucess").hide();
                      } else if ( obj.message == "Sucess" ) {
                          $("#messageSucess").show();
                          $("#messageSucess").html(obj.dataSucess);
                          $("#titleMessageError").html("");
                          $("#DescriptionMessageError").html("");
                          $("#titleMessage").val("");
                          $("#messageDiscription").val("");
                      }
                    }
                });
           }

        function get_list_messages(page = 1) {

            $.ajax({
                    url : "./messages/getListMessage.php",
                    type : "get",
                    dataType:"text",
                    data : {
                     show_per_page:6,
                     page: page,
                     links: 6,
                  },
                    success : function (result) {

                      var obj = JSON.parse(result);
                      var html = '';
                      var defaultFormat = "dddd, MMMM Do YYYY, h:mm a";
                       $.each(obj.data, function (key, obj){

                            html  +=  ' <div class="col-sm-6 col-md-6 col-lg-6 col-xl-6 background-message ">';
                            html  +=  '<p style="">' +obj.description_message +'</p>';
                            html  +=  '<div> <span style="" class="outher-name">' +obj.user_login +'</span> </div>';     
                            html  +=  '<div> <span class="time-post">' +moment(obj.created_at).format(defaultFormat)+'</span>';
                            html  +=  '<button class="cover-icon" onclick="delete_message_by_id('+obj.ID+')" > <i class="far fa-trash-alt"></i></button>';
                            html  +=  '<button class="cover-icon" style="margin-right: 5px" onclick="get_message_by_id('+obj.ID+')" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-pen"></i> </button>';
                            html  +=   '</div> </div>';  
                      });   
                      $("#show-meassage").html(html);
                      $("#pagination-message").html(obj.pagination);
                    }
                });

        }

        function get_message_by_id (id) {

               $('#exampleModalLabel').html('Edit Message');
               $('#outherNameHidden').hide();
               $("#titleMessageError").html("");
               $("#DescriptionMessageError").html("");
               $("#messageSucess").hide();
               $("#messages_id").val(id);

               $.ajax({
                    url : "./messages/getDetailMessage.php",
                    type : "get",
                    dataType:"text",
                    data : {
                     ID:id,

                  },
                    success : function (result){

                      var obj = JSON.parse(result);
                      $("#titleMessage").val(obj.title_message);
                      $("#messageDiscription").val(obj.description_message);
                      $("#visitor_id").val(obj.user_id);
                      $("#outherName").val(obj.user_login);
                      $("#saveMessage").show();
                      $("#postMessage").hide();

                   }
                 });
        }
       function edit_message (id) {

               $('#exampleModalLabel').html('Edit Message');
               $.ajax({
                    url : "./messages/editMessage.php",
                    type : "post",
                    dataType:"text",
                    data : {
                     ID: $('#messages_id').val(),
                     title_message: $('#titleMessage').val(),
                     description_message: $('#messageDiscription').val(),

                  },
                    success : function (result){
                      var obj = JSON.parse(result);

                      if(obj.message == "Error") {
                          $("#titleMessageError").html(obj.title_messageErr);
                          $("#DescriptionMessageError").html(obj.description_messageErr);
                          $("#messageSucess").hide();
                      } else if ( obj.message == "Sucess" ) {
                          $("#messageSucess").show();
                          $("#messageSucess").html(obj.dataSucess);
                          $("#titleMessageError").html("");
                          $("#DescriptionMessageError").html("");
                           var page = getQueryVariable("page"); 
                           if(page != false) {
                             get_list_messages(page);
                           } else {
                             var page = 1;
                             get_list_messages(page);
                           }

                      }

                   }
                 });

        }

        function delete_message_by_id(id) {

            swalWithBootstrapButtons.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
          }).then((result) => {
            if (result.value) {
                $.ajax({
                    url : "./messages/deleteMessage.php",
                    type : "post",
                    dataType:"text",
                    data : {
                     ID: id,
                  },
                    success : function (result){
                      var obj = JSON.parse(result);
                      if(obj.message == "Error") {
                          $("#messageSucess").hide();
                      } else if ( obj.message == "Sucess" ) {
                           var page = getQueryVariable("page"); 
                           if(page != false) {
                             get_list_messages(page);
                           } else {
                             var page = 1;
                             get_list_messages(page);
                           }

                      }

                   }
                 });

              swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            } else if (
              // Read more about handling dismissals
              result.dismiss === Swal.DismissReason.cancel
            ) {
              swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
              )
            }
      })

        }

        function getQueryVariable(variable)
         {
                 var query = window.location.search.substring(1);
                 var vars = query.split("&");
                 for (var i=0;i<vars.length;i++) {
                         var pair = vars[i].split("=");
                         if(pair[0] == variable){return pair[1];}
                 }
                 return(false);
          }

      </script>

<style type="text/css">

#logo {
  text-align: center;
}

.cover-left {
  background-color: #e9ecef;
}
.cover-content {
  background-color: #212529d1;
  color: white;
}
.cover-icon {
  background-color: #ad1c29;
  border-radius: 30px;
  color: white;
  border: 1px solid #ad1c29;
  width: 35px;
  height: 35px;
  float: right;
}
.time-post {
  opacity: 0.7;
  font-size: 13px;

}
.outher-name {
   font-size: 20px;
   font-family: Caveat; 
   font-style:italic;
}
.page-link {
  background-color: transparent;
  color:white;
  border-radius: 20px;
  border-style: none;
}
.active {
  background-color: #ad1c29;
  border-radius: 20px;
}
.page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #ad1c29;
    border-color: #ad1c29;

}
.page-link:hover {
    z-index: 2;
    background-color: #ad1c29;
}
.page-link:focus {
    z-index: 2;
    outline: 0;
    box-shadow: 0 0 0 0.2rem #ad1c29 !important;
}
.footer-admin {
  min-height: 62%;
  clear: both;
}
.admin-darkbroad {
  position: absolute;
  margin-top: 150%;
  color: gray;
  font-weight: 600;
}
.error {
  color: #FF0000;
}

.sucess {
  color: #FF0000;
}

#pagination-message {
  text-align: center;
  margin: 0 auto;
}
.background-message {
   padding: 15px 15px 15px 15px;

}


</style>


