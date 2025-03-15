// let test = document.getElementsByClassName("test")[0];
// let chat_header = document.getElementsByClassName("chat-header")[0];
// let chat_history = document.querySelectorAll(".chat-history ul")[0];
// let msg_submit_btn = document.querySelectorAll("button.input-group-text");
// let input_msg = document.getElementById("msg");
// let people_list_name = '';
// let receiver = '';
// let personal_chat_room = '';
// let loadder_chat = 0;
// let spinner_load = '';

// function chat_headerf(str) {
//   receiver = str;
//   var xmlhttp = new XMLHttpRequest();
//   xmlhttp.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       chat_header.innerHTML = this.responseText;
//     }
//   };
//   xmlhttp.open("GET", "box_head.php?id=" + str, true);
//   xmlhttp.send();
//   chat(str);
// }

// function chat(str) {
//   var xmlhttp = new XMLHttpRequest();
//   xmlhttp.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       chat_history.innerHTML = this.responseText;
//     }
//   };
//   xmlhttp.open("GET", "box.php?receiver_id=" + str, true);
//   xmlhttp.send();

//   personal_chat_room = chat_history.children[0];
// }

// function people_list(str) {
//   var xmlhttp = new XMLHttpRequest();
//   xmlhttp.onreadystatechange = function () {
//     if (this.readyState == 4 && this.status == 200) {
//       document.getElementsByClassName("chat-list")[0].innerHTML = this.responseText;
//     }
//   };
//   if (str.length == 0) {
//     xmlhttp.open("GET", "assets/module/chat_list_people.php", true);
//   } else {
//     xmlhttp.open("GET", "assets/module/chat_list_people.php?q=" + str, true);
//   }
//   xmlhttp.send();

//   // if(document.getElementsByClassName("chat_active")[0].lastChild.classList[0] == 'badge'){
//     // document.getElementsByClassName("chat_active")[0].children[2].remove(document.getElementsByClassName("chat_active")[0].children[2])
//   // }
// }
// function chat_open(str) {
//   receiver = str;
//   chat_headerf(str);
//   chat(str);
//   people_list("");
// }

// // image upload
// let file = '';
// function filee() {
//   file = document.querySelector("#file");
//   file.addEventListener("change", function () {
//     document.querySelector(".chat-header #form button").classList.remove("d-none");
//   });
// }
// setTimeout(filee, 100);

// let lastMaxId = 0;
// function checkForUpdates() {
//   fetch("assets/module/check_user_have_new_msg.php")
//     .then(response => response.json())
//     .then(data => {
//       const newMaxId = data.max_id;
//       if (newMaxId > lastMaxId) {
//         lastMaxId = newMaxId;
//         people_list("");
//       }
//     })
//     .catch(error => console.error("Error checking updates:", error));
// }
// setInterval(checkForUpdates, 500);

// let last_chat_id_receive = 0;
// function last_chat_notificationi() {

//   fetch("assets/module/check_user_have_new_msg.php")
//     .then(response => response.json())
//     .then(data => {
//       const total_msg = data.total_msg;
//       if (total_msg != last_chat_id_receive) {
//         last_chat_id_receive = total_msg;
//         setTimeout(chat(receiver), 1000);
//         // chat(receiver);
//       }
//     })
//     .catch(error => console.error("Error checking updates:", error));
// }
// setInterval(last_chat_notificationi, 500);


// // all people list jquery
// $(document).ready(function () {
//   $(document).on('click', '.people-list ul li', function () {
//     $("li").removeClass("chat_active");
//     $(this).addClass("chat_active");
//     $("li.chat_active span.badge").remove("span");
//   });
// });

// msg_submit_btn[0].addEventListener("click", function () {
//   if (input_msg.value.length > 0) {
//     chat_history.scrollTop = 0;
//     var xmlhttp = new XMLHttpRequest();
//     xmlhttp.open("GET", "assets/module/func.php?q=" + input_msg.value, true);
//     xmlhttp.send();
//   }
//   input_msg.value = '';
// });

// document.getElementById('files').addEventListener('change', function (e) {
//   e.preventDefault();
//   chat_history.scrollTop = 0;
//   const files = document.getElementById('files').files;
//   // const uploadContainer = chat_history.lastChild.insertBefore(document.createElement('li'), chat_history.lastChild.firstChild);
//   const uploadContainer = chat_history.insertBefore(document.createElement('li'), chat_history.firstChild);
//   uploadContainer.classList.add("clearfix");
//   Array.from(files).forEach(file => {
//     const fileItem = document.createElement('div');
//     fileItem.classList.add('message-data', 'text-right', 'progress', 'float-right', 'w-50');
//     fileItem.innerHTML = `<div class="progress-circle">
//               <span>0%</span>
//           </div>`;
//     uploadContainer.appendChild(fileItem);
//     const progressCircle = fileItem.querySelector('.progress-circle');
//     const progressText = progressCircle.querySelector('span');

//     const formData = new FormData();
//     formData.append('file', file);
//     const xhr = new XMLHttpRequest();
//     xhr.open('POST', 'assets/module/image_upload.php', true);
//     xhr.upload.onprogress = function (event) {
//       if (event.lengthComputable) {
//         const percentComplete = Math.round((event.loaded / event.total) * 100);
//         progressCircle.style.background = `conic-gradient(#4caf50 ${percentComplete}%, #f3f3f3 ${percentComplete}%)`;
//         progressText.textContent = `${percentComplete}%`;
//       }
//     };
//     xhr.send(formData);

//   });
// });

// //delete message
// function delete_chat(msg_id) {
//   var xmlhttp = new XMLHttpRequest();
//   var choice = confirm("sure u want to delete?");
//   if (choice) {
//     xmlhttp.open("GET", "assets/module/chat_delete.php?msg_id=" + msg_id, true);
//     xmlhttp.send();
//     $(document).ready(function () {
//       $(document).on('click', '.chat-history ul li', function () {
//         $(this).remove();
//       });
//     });
//     // chat(receiver);
//   }
// }

// // chat loading with scoll **********************************************************************************

// let offset = 5;
// const limit = 5;
// let loading = false;
// async function load_chat_scroll_by(){

//   spinner_load = document.getElementById("spinner_loader_parent");
//   spinner_load.parentNode.removeChild(spinner_load);
//   loadder_chat = 0;

//   if (loading) return;
//   loading = true;
//   const response = await fetch(`bo.php?offset=${offset}&limit=${limit}&receiver_id=${receiver}`);
//   const data = await response.json();
//   data.forEach(row => {
//     let li = document.createElement('li');
//     li.className = 'clearfix';
//     chat_history.appendChild(li);
//     let content = row.msg;
//     if(row.msg_id != undefined){
//       let image = 'defaultuser/user.png';
//       if(row.profile != null){
//         image = row.profile;
//       }
//       if(content == null){
//         content = row.file;
//         extension = content.split('.').pop();
//         if(extension=='png'){
//           li.innerHTML = '<div class="message-data text-right"><span class="message-data-time">'+ row.time +'</span><img src="./assets/img/'+ image +'" alt="avatar"></div><div class="message other-message float-right w-50"><img class="w-100" src="./assets/img/chait_img/'+ content+'" alt="avatar"></div><i class="fa-solid fa-trash text-danger" onclick="delete_chat('+ row.msg_id +');"></i>';
//         }else if(extension=='mp4'){
//             li.innerHTML = '<div class="message-data text-right"><span class="message-data-time">'+ row.time +'</span><img src="./assets/img/'+ image +'" alt="avatar"></div><div class="message other-message float-right w-50"><video width="100%" height="auto" controls><source src="./assets/img/chait_img/'+ content +'" type="video/mp4"></video></div><i class="fa-solid fa-trash text-danger" onclick="delete_chat('+ row.msg_id +');"></i>';
//         }else if(extension=='mp3'){
//             li.innerHTML = '<div class="message-data text-right"><span class="message-data-time">'+ row.time +'</span><img src="./assets/img/'+ image +'" alt="avatar"></div><div class="message other-message float-right w-50"><audio controls><source src="./assets/img/chait_img/'+ content +'" type="audio/mpeg"></audio></div><i class="fa-solid fa-trash text-danger" onclick="delete_chat('+ row.msg_id +');"></i>';
//         }else if(extension=='pdf'){
//             li.innerHTML = '<div class="message-data text-right"><span class="message-data-time">'+ row.time +'</span><img src="./assets/img/'+ image +'" alt="avatar"></div><div class="message other-message float-right w-50"><iframe src="./assets/img/chait_img/'+ content +'" frameborder="0" class="w-100"></iframe><br><div class="alert alert-danger text-center bg-transparent p-0 m-0 border-0" role="alert">'+ content +' <a href="./assets/img/chait_img/'+ content +'" class="alert-link" download> Download </a></div></div><i class="fa-solid fa-trash text-danger" onclick="delete_chat('+ row.msg_id +');"></i>';
//         }else if(extension =='exe'){
//             li.innerHTML = '<div class="message-data text-right"><span class="message-data-time">'+ row.time +'</span><img src="./assets/img/'+ image +'" alt="avatar"></div><div class="message other-message float-right w-40"><div class="alert alert-danger bg-transparent p-0 m-0 border-0" role="alert">'+ content +' <p class="alert-link m-0">Something Wrong <span class="badge badge-danger">!</span></p></div></div><i class="fa-solid fa-trash text-danger" onclick="delete_chat('+ row.msg_id +');"></i>';
//         }else{
//             li.innerHTML = '<div class="message-data text-right"><span class="message-data-time">'+ row.time +'</span><img src="./assets/img/'+ image +'" alt="avatar"></div><div class="message other-message float-right w-40"><div class="alert alert-danger bg-transparent p-0 m-0 border-0" role="alert">'+ content +' <a href="./assets/img/chait_img/'+ content +'" class="alert-link" download> Download </a></div></div><i class="fa-solid fa-trash text-danger" onclick="delete_chat('+ row.msg_id +');"></i>';
//         }
//       }else{
//         li.innerHTML = '<div class="message-data text-right"><span class="message-data-time">'+ row.time +'</span><img src="./assets/img/'+ image +'" alt="avatar"></div><div class="message other-message float-right">'+ content +'</div><i class="fa-solid fa-trash text-danger" onclick="delete_chat('+ row.msg_id +');"></i>';
//       }
//     }else{
//       if(content == null){
//         content = row.file;
//         extension = content.split('.').pop();
//         if(extension=='png'){
//           li.innerHTML = '<div class="message-data"><span class="message-data-time">'+ row.time +'</span></div>          <div class="message my-message w-50"><img class="w-100" src="./assets/img/chait_img/'+ content +'" alt="avatar"></div>';
//         }else if(extension=='mp4'){
//           li.innerHTML = '<div class="message-data"><span class="message-data-time">'+ row.time +'</span></div>          <div class="message my-message w-50"><video width="100%" height="auto" controls><source src="./assets/img/chait_img/'+ content +'" type="video/mp4"></video></div>';
//         }else if(extension=='mp3'){
//           li.innerHTML = '<div class="message-data"><span class="message-data-time">'+ row.time +'</span></div>          <div class="message my-message w-50"><audio controls><source src="./assets/img/chait_img/'+ content +'" type="audio/mpeg"></audio></div>';
//         }else if(extension=='pdf'){
//           li.innerHTML = '<div class="message-data"><span class="message-data-time">'+ row.time +'</span></div>          <div class="message my-message w-50"><iframe src="./assets/img/chait_img/'+ content +'" frameborder="0" class="w-100"></iframe><br><div class="alert alert-danger text-center bg-transparent p-0 m-0 border-0" role="alert">'+ content +' <a href="./assets/img/chait_img/'+ content +'" class="alert-link" download> Download </a></div></div>';
//         }else if(extension=='exe'){
//           li.innerHTML = '<div class="message-data"><span class="message-data-time">'+ row.time +'</span></div>          <div class="message my-message w-40"><div class="alert alert-danger bg-transparent p-0 m-0 border-0" role="alert">'+ content +' <p class="alert-link m-0">content may be harmful <span class="badge badge-danger">!</span></p></div></div>';
//         }else{
//           li.innerHTML = '<div class="message-data"><span class="message-data-time">'+ row.time +'</span></div>          <div class="message my-message w-40"><div class="alert alert-danger bg-transparent p-0 m-0 border-0" role="alert">'+ content +' <a href="./assets/img/chait_img/'+ content +'" class="alert-link" download> Download </a></div></div>';
//         }
//       }else{
//         li.innerHTML = '<div class="message-data"><span class="message-data-time">'+ row.time +'</span></div><div class="message my-message">'+ content +'</div>';
//       }
//     }
//   });
//   offset += limit;
//   loading = false;
// }
// // Handle scrolling
// function scroll_chat_for_loading(){
//   let x = chat_history.scrollHeight + (chat_history.scrollTop - 370);
//   if (x < 5) {
//     if(loadder_chat == 0){
//       let div = document.createElement("div");
//       div.setAttribute("id", "spinner_loader_parent");
//       chat_history.appendChild(div);
//       div.innerHTML = '<div id="spinner_loader"></div>';
//       loadder_chat = 1;
//     }
//     setTimeout(load_chat_scroll_by, 1500);
//   }
// }



// laravel
let receiver_id = document.querySelector('.chat-message #receiver').value;

chat_history(receiver_id);
function chat_history(receiver_id) {
    let data = new FormData();
    data.append('_token', document.querySelector('meta[name="csrf-token"]').content);
    data.append('receiver',receiver_id);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.querySelector("ul.m-b-0").innerHTML = this.responseText;
        }
    };
    xhttp.open("POST", "message", true);
    xhttp.send(data);
}

user_list();
function user_list(name = '') {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.querySelector(".chat-list").innerHTML = this.responseText;
        }
    };
    if(name.length == 0){
        xhttp.open("GET", "users", true);
    }else{
        xhttp.open("GET", "users/"+name, true);
    }
    xhttp.send();
}

// logout()
function logout() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
        document.querySelector(".chat-header").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "users", true);
    xhttp.send();
}

function people_list(user_id){
    receiver_id = user_id;
    chat_history(receiver_id);
}

// click chat open
$(document).on("click", ".chat-list li", function() {
    document.querySelector('.chat-message #receiver').value = receiver_id;
    let value = $(this.innerHTML);
    let image = value[0].src;
    let name = value[2].children[0].innerHTML;
    let status = value[2].children[1].innerText;
    document.querySelector('.chat-header img').src = image;
    document.querySelector('.chat-header .chat-about h6').innerHTML = name;

    if(status == ' online'){
        document.querySelector('.chat-header .chat-about small').innerHTML = '<i class="fa fa-circle online"></i>Online';
    }else{
        document.querySelector('.chat-header .chat-about small').innerHTML = '<i class="fa fa-circle ofline text-danger"></i>'+status;
    }
});

// search with name
$(document).on("keyup", "#search", function() {
    user_list(this.value);
});






