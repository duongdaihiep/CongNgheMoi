document.addEventListener("DOMContentLoaded", function() {
    // Lắng nghe sự kiện khi nhấn vào tab
    var tabs = document.querySelectorAll('.nav-tabs .nav-link');
    var firstTab = tabs[0];
    // firstTab.classList.add('active');
    tabs.forEach(function(tab) {
        tab.addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của tab

            // Ẩn tất cả nội dung của các tab
            var tabContents = document.querySelectorAll('.tab-pane');
            tabContents.forEach(function(content) {
                content.classList.remove('show', 'active');
            });

            // Hiển thị nội dung của tab được nhấn
            var targetTabId = tab.getAttribute('href');
            var targetTabContent = document.querySelector(targetTabId);
            targetTabContent.classList.add('show', 'active');
        });
    });
});
