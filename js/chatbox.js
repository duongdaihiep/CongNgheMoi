
// hàm hiện chatbox
var chatIcon = document.querySelector(".fa-comments");
    chatIcon.addEventListener("click", function() {
        // Ẩn biểu tượng chat
        chatIcon.style.display = "none";
        // Hiện hộp thoại tin nhắn
        var chatContainer = document.querySelector(".chat-container");
        chatContainer.style.display = "block";
    });




// Hàm ẩn chatbox
function closeChatbox() {
    var chatContainer = document.querySelector(".chat-container");
    chatContainer.style.display = "none";
    // Hiển thị lại biểu tượng chat
    var chatIcon = document.querySelector(".fa-comments");
    chatIcon.style.display = "block";
}

function sendMessage() {
    const messageInput = document.getElementById('messageInput');
    const message = messageInput.value.trim();
    if (message === '') return;

    displayMessage(message, 'sent');
    messageInput.value = '';

    // Giả lập tin nhắn từ chatbot
    setTimeout(() => {
        const botReply = 'Đây là phản hồi từ chatbot';
        displayMessage(botReply, 'received');
    }, 1000); // Đợi 1 giây trước khi trả lời
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
    var inputGroup = document.getElementById("inputGroup");
    var questionGroup = document.getElementById("questionGroup");

    // Kiểm tra xem phần tử đang được hiển thị hay ẩn
    if (inputGroup.style.display === "none") {
        inputGroup.style.display = "flex"; // Hiển thị phần tử inputGroup
        questionGroup.style.display = "none"; // Ẩn phần tử questionGroup
    } else {
        inputGroup.style.display = "none"; // Ẩn phần tử inputGroup
        questionGroup.style.display = "flex"; // Hiển thị phần tử questionGroup
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

function botSendMessage() {
    const messageInput = document.getElementById('question');
    const message = messageInput.textContent.trim();
    if (message === '') return;
 
    displayMessage(message, 'sent');
}
// làm tới đây rồi nè
function botReceivedMessage(){
    // Lấy tất cả các phần tử có class là 'sent'
const sentElements = document.querySelectorAll('.sent');

    // Kiểm tra nếu có ít nhất một phần tử trong danh sách
    if (sentElements.length > 0) {
        // Lấy phần tử cuối cùng trong danh sách
        const lastSentElement = sentElements[sentElements.length - 1];

        // Lấy nội dung văn bản của phần tử cuối cùng
        const lastSentText = lastSentElement.textContent.trim();

        // In ra nội dung văn bản của phần tử cuối cùng
        console.log(lastSentText);
    }
}
function createButtons(array) {
    var questionGroup = document.getElementById("questionGroup");
    if (!questionGroup) return; // Kiểm tra xem phần tử đã tồn tại hay không

    // Xóa bất kỳ phần tử con nào đã tồn tại trong phần tử questionGroup
    questionGroup.innerHTML = '';

    // Lặp qua mỗi phần tử trong mảng và tạo một nút cho từng phần tử đó
    array.forEach(function(value) {
        var button = document.createElement("button");
        button.className = "question";
        button.textContent = value;
        questionGroup.appendChild(button);
    });
}

// Ví dụ sử dụng:
var array = ["Apple", "Banana", "Orange", "Grape"];
createButtonsFromArray(array);











// Cập nhật chatbox mỗi 2 giây
setInterval(updateChatbox, 2000);
