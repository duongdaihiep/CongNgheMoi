
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
let sent4=['1.000.000-3.000.000','3.000.000-6.000.000','6.000.000-12000000','Trên 12.000.000']
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
        console.log(lastSentText);
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
    }
    console.log(answer);
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

function checkSession() {
    fetch('../php/check_session.php')
    .then(response => {
        console.log('Raw response:', response); // Log phản hồi thô
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.text(); // Lấy phản hồi dưới dạng text
    })
    .then(text => {
        console.log('Response text:', text); // Log phản hồi dưới dạng text
        try {
            const data = JSON.parse(text); // Chuyển đổi text sang JSON
            if (data.logged_in) {
                console.log('A session is active.');
                // Thực hiện các hành động khi có phiên đang hoạt động
            } else {
                console.log('No active session found.');
                // Thực hiện các hành động khi không có phiên đang hoạt động
            }
        } catch (error) {
            console.error('Error parsing JSON:', error); // Log lỗi khi parse JSON
        }
    })
    .catch(error => console.error('Error checking session:', error));
}

// Gọi hàm kiểm tra phiên khi trang được tải
checkSession();

