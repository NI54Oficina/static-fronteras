/*
Created by: Kenrick Beckett

Name: Chat Engine
*/

var instanse = false;
//var state;
var mes;
var file;

var idSession=11;
var activeChat=0;

var lastId=0;

function Chat () {
    this.update = updateChat;
    this.send = sendChat;
	this.getState = getStateOfChat;
	this.state=0;
	this.instanse=false;
}

var nombreUser="usuario";

//gets the state of the chat
function getStateOfChat(idChat){
	
}

var admMsg="";
var firstMSG=true;
//Updates the chat
function updateChat(idChat){
	//$('[chatid='+idChat+'] .chat-area').append(
	var auxM="<div class='user-message-container'><p class='user-nick'>"+ nombreUser + "</p> <p class='user-message'> " + idChat+"</p></div>" + "\n";
	$('[chatid=-1] .chat-area').append(auxM);
	
	if(firstMSG){
		firstMSG=false;
		setTimeout(function(){
			admMsg="<div class='admin-message-container'><p class='admin-nick'>"+ "Admin" + "</p> <p class='admin-message'> " + "Hola, bienvenido a la mesa de ayuda."+"</p></div>" + "\n";
			$('[chatid=-1] .chat-area').append(admMsg);
		},2500);
		setTimeout(function(){
			admMsg="<div class='admin-message-container'><p class='admin-nick'>"+ "Admin" + "</p> <p class='admin-message'> " + "¿En que puedo ayudarle?"+"</p></div>" + "\n";
			$('[chatid=-1] .chat-area').append(admMsg);
		},4200);
	}else{
		setTimeout(function(){
			admMsg="<div class='admin-message-container'><p class='admin-nick'>"+ "Admin" + "</p> <p class='admin-message'> " + "Puede obtener más información en la mesa de ayuda de la aplicación. El horario de atención es de 8:30 a 17 horas ¡Lo esperamos! "+"</p></div>" + "\n";
			$('[chatid=-1] .chat-area').append(admMsg);
		},4200);
	}
}

var baseChat='<div class="page-wrap" chatid="{chatID}"><div class="chat-wrap"><div class="chat-area"></div></div><form class="send-message-area"><textarea class="sendie" maxlength="300"></textarea></form></div>';
var baseChatButton='<div class="chatSelector" idChat="{chatID}"><h3>{chatNombre}</h3><p>{chatMOTIVO}</p><button type="button" class="closeChat">Finalizar chat</button></div>';

function CheckNewChats(){
	$.post(checkURL+lastId,function(data){
		console.log(data);
		if(data!=""){
			var newIDs=data.split(",");
			console.log(newIDs);
			for(var a=0;a<newIDs.length;a++){
				if(parseInt(newIDs[a])<=parseInt(lastId)){
					continue;
				}
				lastId=newIDs[a];
				var currentLoopId=newIDs[a];
				$.post(dataURL+currentLoopId,function(data){
					console.log("entra data "+data);
					var chatData=data.split(";;;;;");
					var newChat= baseChat;
					newChat= newChat.replace("{chatID}",currentLoopId);
					$(".chatsContainer").append(newChat);
					$("[chatid="+currentLoopId+"]").hide();
					newChat= baseChatButton;
					newChat= newChat.replace("{chatID}",currentLoopId);
					newChat= newChat.replace("{chatNombre}",chatData[0]);
					newChat= newChat.replace("{chatMOTIVO}",chatData[1]);
					$(".adminLateral").append(newChat);

					var auxChat=new Chat();
					chats[currentLoopId]=auxChat;
					auxChat.getState(currentLoopId);
				});
			}
		}
	});
}

//send the message
function sendChat(message, nickname,idChat)
{
    updateChat(message);
    
}


function UpdateChats(){
	/*$.each(chats,function(key,value){
		chats[key].update(key);
	});*/
}

$("body").on("click",".chatSelector",function(){
	 ShowChat($(this).attr("idChat"));
});

function ShowChat(idChat){
	$(".page-wrap").hide();
	$('.chatSelector').removeClass("activeChat");
	$('[chatid='+idChat+']').css("display","inline-block");
	activeChat=idChat;
		$('[idChat='+idChat+']').removeClass("unreadChat");
		$('[idChat='+idChat+']').addClass("activeChat");

}

$("#datosUser").on('submit', function(e){
	  e.preventDefault();
	  console.log("entra user");
    $(".title-inside-ayuda p").hide();
    $(".title-ayuda-mobile").hide();
	  $("#datosUser").hide();
	  nombreUser=$("#datosUser [name=nombre]").val();
			  InitUserChat("-1");
  });

  function InitUserChat(data){
		$(".chatUser").attr("chatid",data);
		$(".chatUser").show();
		var auxChat=new Chat();
		chats[data]=auxChat;
		auxChat.getState(data);
  }

 $("body").on("click",'.closeChat',function(){
	 console.log("entra close");
	var idToClose=$(this).parent().attr("idChat");
	var auxTarget=this;
	$(this).hide();
	$.post(deleteURL+idToClose,function(data){
		console.log("enviado");
		$(auxTarget).parent().hide();
	});
 });
