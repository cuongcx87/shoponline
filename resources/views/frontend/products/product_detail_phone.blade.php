<div class="col-lg-4">
    <h4 class="p-2">Thông số kỹ thuật</h4>
    <table class="table">
        <tbody>
            <tr>
                <td>Màn hình:</td>
                <td>{{ $product->product_details->screen }}</td>
            </tr>
            <tr>
                <td>Hệ điều hành:</td>
                <td>{{ $product->product_details->os }}</td>
            </tr>
            <tr>
                <td>Camera sau:</td>
                <td>{{ $product->product_details->camera_after }}</td>
            </tr>
            <tr>
                <td>Camera trước:</td>
                <td>{{ $product->product_details->camera_before }}</td>
            </tr>
            <tr>
                <td>CPU:</td>
                <td>{{ $product->product_details->cpu }}</td>
            </tr>
            <tr>
                <td>RAM:</td>
                <td>{{ $product->product_details->ram }}</td>
            </tr>
            <tr>
                <td>Bộ nhớ trong:</td>
                <td>{{ $product->product_details->rom }}</td>
            </tr>
            <tr>
                <td>Thẻ SIM:</td>
                <td>{{ $product->product_details->sim }}</td>
            </tr>
            <tr>
                <td width="150px">Dung lượng pin:</td>
                <td>{{ $product->product_details->battery }}</td>
            </tr>
        </tbody>
  </table>
</div>