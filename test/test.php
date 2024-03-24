<div class="container">
    <!-- Thông tin khách hàng -->
    <!-- Form chỉnh sửa -->
    <button type="button" class="btn btn-primary edit-button" onclick="enableEditAll()">Chỉnh Sửa Tất Cả</button>
    
    <h3>Lịch Sử Đơn Hàng</h3>
    <table id="order-history-table" class="table">
        <thead>
            <tr>
                <th scope="col">Đơn Hàng</th>
                <th scope="col">Ngày Đặt</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Thanh Toán</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dữ liệu sẽ được thêm bằng PHP -->
            <?php include 'get_order_history.php'; ?>
        </tbody>
    </table>
</div>
