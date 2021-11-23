<!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Chat Kasir</h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow">3</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>                    
                    <button type="button" class="btn btn-box-tool" data-widget="remove">
                      <i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body" id="body_chat">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" id="chatnya">
                   

                  </div>
                  <!--/.direct-chat-messages-->

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <form action="#" method="post" id="msg_form">
                    <div class="input-group">
                      <input type="text" name="message" placeholder="Type Message ..." class="form-control" id="pesannya">
                      <span class="input-group-btn">
                            <button type="button" class="btn btn-warning btn-flat" id="kirim_pesan">Send</button>
                          </span>
                    </div>
                  </form>
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->



 <!-- CSS -->
 
 <script type="text/javascript">
  
var dari_id = "<?php echo $dari_id?>";
var dari_nama = "<?php echo $dari_nama?>";
var kpd_id = "<?php echo $kpd_id?>";
var kpd_nama = "<?php echo $kpd_id?>";
var tgl = "<?php echo date('Y-m-d H:i:s')?>";



//create firebase reference
var chatsRef = dbRef.child('chat');

var newItems = false;

//load older conatcts as well as any newly added one...
chatsRef.on("child_added", function(snap){
  console.log("added", snap.key(), snap.val());
  

  document.querySelector('#chatnya').innerHTML += (chatHtmlFromObject(snap.val()));   
  
  if(snap.val().kpd_id==dari_id && snap.val().baca=="belum")
  {
    //*********************notification********************************************//
    new Audio("<?php echo base_url()?>assets_chat/notif.mp3").play();
    //doNotification (snap.val().dari_nama,snap.val().isi,snap.val().tgl);
    notifyMe(snap.val().dari_nama,snap.val().isi);
    document.title = snap.val().dari_nama,snap.val().isi;
    //*********************notification********************************************// 
    
    chatsRef.child(snap.key()).update({baca:"sudah"});
    $.post("<?php echo base_url()?>index.php/chat/update_chat/"+snap.val().firebase_id);
  }

  if (!newItems) return;    
  
  updateScroll();
  

});

chatsRef.once('value', function(snap){
  newItems = true;
  updateScroll();

});


function updateScroll(){
    var element = document.getElementById("chatnya");
    element.scrollTop = element.scrollHeight;
}


//prepare conatct object's HTML
function chatHtmlFromObject(chat) 
{
  console.log(chat);
  
  if(chat.dari_id==dari_id)
  {
    var bubble = "right";
    var balik  = "left";
    var icon   = "avatar2.png";
  }else if(chat.kpd_id==dari_id){
    var bubble = "left";
    var balik  = "right";
    var icon   = "user3-128x128.jpg";
  }


  var html = '<div class="direct-chat-msg '+bubble+'">'+
                      '<div class="direct-chat-info clearfix">'+
                        '<span class="direct-chat-name pull-'+bubble+'">' +chat.dari_nama+'</span>'+
                        '<span class="direct-chat-timestamp pull-'+balik+'">'+chat.tgl+'</span>'+
                      '</div>'+
                      '<img class="direct-chat-img" src="<?php echo base_url()?>dist/img/'+icon+'" alt="message user image">'+
                      '<div class="direct-chat-text">'+chat.isi+'</div>'+
                    '</div>';
  
  if(chat.dari_id==dari_id && chat.kpd_id==kpd_id || chat.kpd_id==dari_id && chat.dari_id==kpd_id){
    return html;
  }else{
    return "";
  }
  
}


//save chat
$("#msg_form").on("submit",function(){

  
  if (document.querySelector('#pesannya').value != '') 
  {
    var firebase_id = "<?php echo date('Ymdhis')?>";
    chatsRef.push({
        dari_id:dari_id,
        dari_nama:dari_nama,
        kpd_id:kpd_id,
        kpd_nama:kpd_nama,
        isi:document.querySelector('#pesannya').value,
        tgl: tgl,
        baca:"belum",
        firebase_id:firebase_id
        
      });
      
    
    //simpan ke db
    var serialize = {
              dari_id:dari_id,
              dari_nama:dari_nama,
              kpd_id:kpd_id,
              kpd_nama:kpd_nama,
              isi:document.querySelector('#pesannya').value,
              baca:"belum",
              firebase_id:firebase_id
            }
    $.post("<?php echo base_url()?>index.php/chat/simpan_chat",serialize,function(){

    })
    //chatForm.reset();
    document.querySelector('#pesannya').value='';
  } else {
    alert('Please fill atlease message!');
  }


  return false;
});



function notifyMe(notifnya) {
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }

  // Let's check whether notification permissions have already been granted
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
    var notification = new Notification(notifnya);
  }

  // Otherwise, we need to ask the user for permission
  else if (Notification.permission !== "denied") {
    Notification.requestPermission().then(function (permission) {
      // If the user accepts, let's create a notification
      if (permission === "granted") {
        var notification = new Notification(notifnya);
      }
    });
  }

  // At last, if the user has denied notifications, and you 
  // want to be respectful there is no need to bother them any more.
}

 </script>