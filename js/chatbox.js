
// hàm hiện chatbox
var chatIcon = document.querySelector(".fa-comments");
    chatIcon.addEventListener("click", function() {
        // Ẩn biểu tượng chat
        chatIcon.style.display = "none";
        // Hiện hộp thoại tin nhắn
        var chatContainer = document.querySelector(".chat-container1");
        chatContainer.style.display = "block";
    });


// Hàm ẩn chatbox
function closeChatbox() {
    var chatContainer = document.querySelector(".chat-container1");
    chatContainer.style.display = "none";
    // Hiển thị lại biểu tượng chat
    var chatIcon = document.querySelector(".fa-comments");
    chatIcon.style.display = "block";
}

function sendMessage() {
    const messageInput = document.getElementById('messageInput');
    const message = messageInput.value.trim();
    if (message === '') return;

    // Gửi dữ liệu tin nhắn đến máy chủ bằng Fetch API
    fetch('../php/sendMessage.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ message: message })
    })
    .then(response => response.text())
    .then(data => {
        // Hiển thị thông báo từ máy chủ
        alert(data);
    })
    .catch(error => {
        console.error('Error:', error);
    });

    // Hiển thị tin nhắn đã gửi trong giao diện người dùng
    displayMessage(message, 'sent');
    messageInput.value = '';
}




function displayMessage(message, sender) {
    const chatbox = document.getElementById('chatbox');
    const messageElement = document.createElement('div');
    messageElement.classList.add('message', sender);
    messageElement.textContent = message;
    chatbox.appendChild(messageElement);

    // Tự động cuộn xuống cuối chatbox khi có tin nhắn mới
    chatbox.scrollTop = chatbox.scrollHeight;
}

function toggleElements() {
    var inputGroup = document.getElementsByClassName("chat-container2")[0];
    var questionGroup = document.getElementsByClassName("chat-container1")[0];

    // Kiểm tra xem phần tử đang được hiển thị hay ẩn
    if (inputGroup.style.display === "none") {  

        inputGroup.style.display = "block"; // Hiển thị phần tử inputGroup
        questionGroup.style.display = "none"; // Ẩn phần tử questionGroup
        // loadChatHistory();
    } else {
        inputGroup.style.display = "none"; // Ẩn phần tử inputGroup
        questionGroup.style.display = "block"; // Hiển thị phần tử questionGroup
    }
}

function clearAllQuestionGroups() {
    var questionGroups = document.getElementsByClassName('question-group');
    for (var i = 0; i < questionGroups.length; i++) {
        questionGroups[i].innerHTML = '';
        // Hoặc sử dụng textContent nếu chỉ muốn xóa văn bản
        // questionGroups[i].textContent = '';
    }
}

function botSendMessage(s) {
    const messageInput = document.getElementById(s);
    const message = messageInput.textContent.trim();
    if (message === '') return;
 
    displayMessage(message, 'sent');
    setTimeout(botReceivedMessage(),1000);
}   
let sent1='Bắt đầu tư vấn';
let sent2=['Giải trí','Chụp Hình','Chơi game','Làm việc']
let sent3=['IOS','Androi']
let sent4=['Dưới 3.000.000','3.000.000-6.000.000','6.000.000-12.000.000','Trên 12.000.000']
let sent5=['CameraAI','Camera trên 12MP', 'Camera zoom 100x', 'không yêu cầu']
let sent6=['Loa Kép','không yêu cầu']
let answer=[]


function botReceivedMessage(){
    // Lấy tất cả các phần tử có class là 'sent'
    const sentElements = document.querySelectorAll('.sent');
    let lastSentText='';
    // Kiểm tra nếu có ít nhất một phần tử trong danh sách
    if (sentElements.length > 0) {
        // Lấy phần tử cuối cùng trong danh sách
        const lastSentElement = sentElements[sentElements.length - 1];

        // Lấy nội dung văn bản của phần tử cuối cùng
        lastSentText = lastSentElement.textContent.trim();

        // In ra nội dung văn bản của phần tử cuối cùng
        // console.log(lastSentText);
    }
    if (lastSentText===sent1){
        displayMessage('Nhu cầu sử dụng của bạn là gì?','received');
        createButtons(sent2);
        answer.push(lastSentText);
    }else if (sent2.includes(lastSentText)){
        displayMessage('Bạn muốn sử dụng máy có hệ điều hành nào?','received');
        createButtons(sent3);
        answer.push(lastSentText)

    }else if(sent3.includes(lastSentText)){
        displayMessage('Bạn có khả năng tài chính tầm bao nhiêu?','received');
        createButtons(sent4);
        answer.push(lastSentText)
    }else if(sent4.includes(lastSentText)){
        displayMessage('Bạn có yêu cầu gì về camera không?','received');
        createButtons(sent5);
        answer.push(lastSentText)
    }else if(sent5.includes(lastSentText)){
        displayMessage('Bạn có yêu cầu gì về loa không?','received');
        createButtons(sent6);
        answer.push(lastSentText)
    }else if(sent6.includes(lastSentText)){
        displayMessage('Chúng tôi dã tìm ra sản phẩm phù hợp cho bạn','received');
        displayMessage('Sản phẩm phù hợp với bạn sẽ hiển thị trên màn hình trang chủ ','received');
        answer.push(lastSentText);
        clearButton();
        sendArray(answer);
    }
    console.log(answer);
}

function clearButton() {
    var questionGroup = document.getElementById("questionGroup");
    if (!questionGroup) return;
    questionGroup.innerHTML = '';
    var button = document.createElement("button");
    button.className = "question";
    // var answer1 = "IOS"; // Giả sử giá trị của answer[2]
    // var answer2 = "6.000.000-12.000.000"; // Giả sử giá trị của answer[3]
    var att = "getProducts('" + answer[2] + "','" + answer[3] + "')";
    button.setAttribute('onclick', att);
    button.textContent = "Tìm điện thoại";
    questionGroup.appendChild(button);
}

function getProducts(os, price) {
    window.location.href = "http://localhost:8080/CNMProject/CongNgheMoi/index.php?os=" + os + "&price=" + price;
}


function createButtons(array) {
    
    var questionGroup = document.getElementById("questionGroup");
    if (!questionGroup) return; // Kiểm tra xem phần tử đã tồn tại hay không

    // Xóa bất kỳ phần tử con nào đã tồn tại trong phần tử questionGroup
    questionGroup.innerHTML = '';
    let i=1;
    // Lặp qua mỗi phần tử trong mảng và tạo một nút cho từng phần tử đó
    array.forEach(function(value) {
        var button = document.createElement("button");
        button.className = "question";
        id='question'+i;
        att="botSendMessage('"+id+"')";
        button.setAttribute('onclick',att);
        button.setAttribute('id',id)
        button.textContent = value;
        questionGroup.appendChild(button);
        i++;
    });
}


