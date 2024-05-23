function clearAllQuestionGroups() {
    var questionGroups = document.getElementsByClassName('question-group');
    for (var i = 0; i < questionGroups.length; i++) {
        questionGroups[i].innerHTML = '';
        // Hoặc sử dụng textContent nếu chỉ muốn xóa văn bản
        // questionGroups[i].textContent = '';
    }
}

