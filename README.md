## Cách chạy và setup project

### B1: giải nén thư mục vào trong XAMPP/htdocs và mở XAMPP/xampp-control.exe và start 2 cái đầu tiên (link tải xampp: https://www.apachefriends.org/download.html, chọn phiên bản 7.4.27)
### B2: tạo database mang tên "citizen" trong phpmyadmin
### B3: import file citizenv.sql ở trong source code
### B4: chạy câu lệnh sau
- php artisan passport:install
- php artisan serve
## B5: truy cập link: 127.0.0.1:8000

## Các tài khoản:
- Tk admin: username: admin, pass: 123456
- Tk A1: username: A1, pass: 123456
