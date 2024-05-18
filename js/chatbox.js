
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

// Cập nhật chatbox mỗi 2 giây
setInterval(updateChatbox, 2000);
