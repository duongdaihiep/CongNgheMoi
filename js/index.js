function login() {
  var username = document.getElementById("username").value;
  var password = document.getElementById("password").value;

  // Perform authentication logic (you may replace this with your server-side logic)
  if (username === "demo" && password === "password") {
    alert("Login successful!");
    $("#loginModal").modal("hide"); // Hide the modal on successful login
  } else {
    alert("Invalid username or password. Please try again.");
  }
}

function register() {
  var newUsername = document.getElementById("newUsername").value;
  var newPassword = document.getElementById("newPassword").value;

  // Perform registration logic (you may replace this with your server-side logic)
  alert("Registration successful for " + newUsername + "!"); // Show a confirmation (you can replace this with a redirect or other action)
}

// slider

let currentIndex = 0;
const intervalTime = 3000; // 3 giây

function changeSlide(direction) {
  const slides = document.querySelector(".slider");
  const totalSlides = document.querySelectorAll(".slide").length;

  currentIndex += direction;

  if (currentIndex < 0) {
    currentIndex = totalSlides - 1;
  } else if (currentIndex >= totalSlides) {
    currentIndex = 0;
  }

  const translateValue = -currentIndex * 100 + "%";
  slides.style.transform = `translateX(${translateValue})`;
}

function nextSlide() {
  changeSlide(1);
}

function autoSlide() {
  setInterval(() => {
    nextSlide();
  }, intervalTime);
}

// Bắt đầu chuyển slide tự động
autoSlide();

// Hàm để hiển thị đơn hàng trong modal
function displayCart() {
    // Lấy thông tin sản phẩm từ nguồn dữ liệu (điều này cần thực hiện tùy thuộc vào cách bạn lưu trữ dữ liệu sản phẩm)
    var products = [
      { id: 1, name: "Sản phẩm 1", price: 10, quantity: 2 },
      { id: 2, name: "Sản phẩm 2", price: 15, quantity: 1 },
    ];
  
    var cartContent = document.getElementById("cartContent");
    cartContent.innerHTML = ""; // Xóa nội dung cũ
  
    var totalAmount = 0;
  
    // Hiển thị thông tin từng sản phẩm trong đơn hàng
    products.forEach(function (product, index) {
      var row = document.createElement("tr");
      row.innerHTML = `
          <td>${index + 1}</td>
          <td>${product.name}</td>
          <td>${product.price}</td>
          <td>
            <button class="btn btn-sm btn-success" onclick="updateQuantity(${
              product.id
            }, 'decrease')">-</button>
            <span id="quantity-${product.id}">${product.quantity}</span>
            <button class="btn btn-sm btn-primary" onclick="updateQuantity(${
              product.id
            }, 'increase')">+</button>
          </td>
          <td id="total-${product.id}">${product.price * product.quantity}</td>
          <td><button class="btn btn-danger btn-sm" onclick="removeProduct(${
            product.id
          })">Xóa</button></td>
        `;
      cartContent.appendChild(row);
  
      totalAmount += product.price * product.quantity;
    });
  
    // Hiển thị tổng số tiền phải thanh toán
    document.getElementById("totalAmount").textContent = totalAmount;
  }
  
  // Hàm cập nhật số lượng sản phẩm
  function updateQuantity(productId, action) {
    var product = products.find((p) => p.id === productId);
  
    if (action === "increase") {
      product.quantity++;
    } else if (action === "decrease" && product.quantity > 1) {
      product.quantity--;
    }
  
    displayCart();
  }
  
  // Hàm xóa sản phẩm khỏi giỏ hàng
  function removeProduct(productId) {
    var index = products.findIndex((p) => p.id === productId);
    if (index !== -1) {
      products.splice(index, 1);
      displayCart();
    }
  }
  

// Hàm tăng số lượng sản phẩm
function increaseQuantity(rowId) {
  // Lấy thông tin từ hàng cụ thể
  const row = document.getElementById(rowId);
  const quantityElement = row.querySelector(".quantity");
  const priceElement = row.querySelector(".price");
  const totalElement = row.querySelector(".total");

  // Tăng số lượng
  let quantity = parseInt(quantityElement.innerText);
  quantity++;
  quantityElement.innerText = quantity;

  // Cập nhật tổng giá
  const price = parseFloat(priceElement.innerText.replace("$", ""));
  const total = quantity * price;
  totalElement.innerText = `$${total.toFixed(2)}`;

  // Cập nhật tổng số tiền phải thanh toán
  updateTotalAmount();
}

// Hàm giảm số lượng sản phẩm
function decreaseQuantity(rowId) {
  // Lấy thông tin từ hàng cụ thể
  const row = document.getElementById(rowId);
  const quantityElement = row.querySelector(".quantity");
  const priceElement = row.querySelector(".price");
  const totalElement = row.querySelector(".total");

  // Giảm số lượng
  let quantity = parseInt(quantityElement.innerText);
  if (quantity > 1) {
    quantity--;
    quantityElement.innerText = quantity;

    // Cập nhật tổng giá
    const price = parseFloat(priceElement.innerText.replace("$", ""));
    const total = quantity * price;
    totalElement.innerText = `$${total.toFixed(2)}`;

    // Cập nhật tổng số tiền phải thanh toán
    updateTotalAmount();
  }
}

// Hàm cập nhật tổng số tiền phải thanh toán
function updateTotalAmount() {
  const totalAmountElement = document.getElementById("totalAmount");
  const totalElements = document.querySelectorAll(".total");
  let totalAmount = 0;

  // Tính tổng giá từ tất cả các sản phẩm trong giỏ hàng
  totalElements.forEach((totalElement) => {
    const total = parseFloat(totalElement.innerText.replace("$", ""));
    totalAmount += total;
  });

  // Hiển thị tổng số tiền phải thanh toán
  totalAmountElement.innerText = `$${totalAmount.toFixed(2)}`;
}

// Hàm xóa sản phẩm khỏi giỏ hàng
function removeProduct(productId) {
  var products = getProducts();
  var updatedProducts = products.filter(function (product) {
    return product.id !== productId;
  });

  // Gửi yêu cầu cập nhật vào CSDL qua AJAX
  removeProductFromDatabase(productId);

  // Hiển thị lại giỏ hàng
  displayCart();
}

// Hàm xóa toàn bộ giỏ hàng
function clearCart() {
  // Gửi yêu cầu xóa toàn bộ giỏ hàng vào CSDL qua AJAX
  clearCartInDatabase();

  // Hiển thị lại giỏ hàng
  displayCart();
}


