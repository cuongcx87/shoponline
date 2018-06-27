<div class="col-lg-4">
    <h4 class="p-2">Thông số kỹ thuật</h4>
    <table class="table">
        <tbody>
            <tr>
                <td>CPU:</td>
                <td>{{ $product->product_details->cpu }}</td>
            </tr>
            <tr>
                <td>RAM:</td>
                <td>{{ $product->product_details->ram }}</td>
            </tr>
                <td>Ổ cứng:</td>
                <td>{{ $product->product_details->hard_disk }}</td>
            </tr>
            <tr>
                <td>Màn hình:</td>
                <td>{{ $product->product_details->screen }}</td>
            </tr>
            <tr>
                <td width="140px">Card màn hình:</td>
                <td>{{ $product->product_details->graphic_card }}</td>
            </tr>
            <tr>
                <td>Cổng kết nối:</td>
                <td>{{ $product->product_details->connection }}</td>
            </tr>
            <tr>
                <td>Hệ điều hành:</td>
                <td>{{ $product->product_details->os }}</td>
            </tr>
            <tr>
            <tr>
                <td>Thiết kế:</td>
                <td>{{ $product->product_details->model }}</td>
            </tr>
            <tr>
                <td>Kích thước:</td>
                <td>{{ $product->product_details->size }}</td>
            </tr>
        </tbody>
  </table>
</div>