<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>XE</title>
    <script src="ckeditor5/ckeditor.js"></script>
    <script src="ckeditor5/ckfinder/ckfinder.js"></script>
</head>
<body>
    <form method="POST" action="themsanpham1.php" enctype="multipart/form-data">
        <table border="1" align="center">
            <tr>
                <td colspan="3" align="center">Nhập sản phẩm</td>
            </tr>
            <tr>
                <td width="200">ID</td>
                <td width="241"><input type="text" name="id" ></td>
            </tr>
            <tr>
                <td width="200">Tên sản phẩm</td>
                <td><input type="text" name="tenxe" ></td>
            </tr>
            <tr>
                <td width="200">Gía</td>
                <td><input type="text" name="gia" ></td>
            </tr>
            <tr>
                <td width="200" height="47">Số Lượng</td>
              <td><input type="text" name="soluong" ></td>
            </tr>
            <tr>
                <td width="200" height="45">ảnh</td>
              <td><input type="file" name="anh" ></td>
            </tr>
            <tr>
                <td width="200" height="51">Danh mục sản phẩm</td>
              <td><input type="text" name="danhmuc" ></td>
                    
            <td width="38">Mô Tả Sản Phẩm</td>
            <td width="221"><textarea name="post_content" id="post_content"></textarea></td>
        </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="submit" value="Gửi"/></td>
            </tr>
        </table>
    </form>
    <script>
       

        ClassicEditor
            .create(document.querySelector('#post_content'), {
                ckfinder: {
                  uploadUrl: 'connector.php'
                }
            })
            .then(editor => {
                console.log("Editor 2 created:", editor);
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</body>
</html>
