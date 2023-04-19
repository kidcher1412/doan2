-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 03, 2023 lúc 09:29 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan2test`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accountrefchucnang`
--

CREATE TABLE `accountrefchucnang` (
  `permission_id` int(11) NOT NULL,
  `chucnang_id` int(11) NOT NULL,
  `valueadd` int(11) NOT NULL,
  `valueedit` int(11) NOT NULL,
  `valuedelete` int(11) NOT NULL,
  `valueread` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accountrefchucnang`
--

INSERT INTO `accountrefchucnang` (`permission_id`, `chucnang_id`, `valueadd`, `valueedit`, `valuedelete`, `valueread`) VALUES
(1, 2, 1, 1, 1, 1),
(1, 3, 1, 1, 1, 1),
(1, 4, 1, 1, 1, 1),
(1, 5, 1, 1, 1, 1),
(1, 6, 1, 1, 1, 1),
(1, 7, 1, 1, 1, 1),
(1, 8, 1, 1, 1, 1),
(1, 9, 0, 0, 0, 0),
(1, 10, 1, 1, 1, 1),
(1, 11, 1, 1, 1, 1),
(1, 12, 1, 1, 1, 1),
(1, 13, 1, 1, 1, 1),
(8, 2, 1, 1, 1, 1),
(8, 3, 1, 1, 1, 1),
(8, 4, 1, 1, 1, 1),
(8, 5, 0, 0, 0, 0),
(8, 6, 0, 0, 0, 0),
(8, 7, 0, 0, 0, 0),
(8, 8, 0, 0, 0, 0),
(8, 9, 1, 1, 1, 1),
(8, 10, 1, 1, 1, 1),
(8, 11, 0, 0, 0, 0),
(8, 12, 0, 0, 0, 0),
(8, 13, 0, 0, 0, 0),
(9, 2, 0, 0, 0, 1),
(9, 3, 0, 0, 0, 1),
(9, 4, 0, 0, 0, 1),
(9, 5, 0, 0, 0, 0),
(9, 6, 0, 0, 0, 0),
(9, 7, 0, 0, 0, 1),
(9, 8, 0, 0, 0, 1),
(9, 9, 1, 0, 0, 1),
(9, 10, 0, 0, 0, 0),
(9, 11, 0, 0, 0, 0),
(9, 12, 0, 0, 0, 0),
(9, 13, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `user_id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `dateborn` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`user_id`, `user`, `pass`, `full_name`, `address`, `mail`, `phone`, `sex`, `dateborn`, `admin`, `status`) VALUES
(1, 'thinh', 'thinh', 'thinh', 'thinh', 'thinh@gmail.com', '0909090909', 'Nữ', '2000-12-30', 0, 0),
(2, 'thong', 'thong', 'Hoàng Lê Anh Thông', '239 cao dat phuong 1 quan 5', 'thong@gmail.com', '0933647040', 'Nam', '2002-06-30', 0, 1),
(3, 'admin', 'admin', 'Admin', 'Admin Address', 'admin@gmail.com', '0909999090', 'Nam', '2002-11-11', 1, 1),
(4, 'testadd', '123123', 'testadd', 'testadd', 'testadd@gmail.com', '0933647040', 'Nam', '2002-12-31', 0, 0),
(5, 'testadd2', '123123', 'testadd2', '239 cao dat phuong 1 quan 5', 'testadd2@gmail.com', '0933647040', 'Nam', '2023-03-23', 0, 1),
(6, 'quanli', 'quanli', 'Quản Lý', 'Quản Lý Address', 'quanly@gmail.com', '0909999090', 'Nam', '2023-03-24', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amonut` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`cart_id`, `product_id`, `user_id`, `amonut`) VALUES
(59, 1, 1, 8),
(69, 1, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethoadons`
--

CREATE TABLE `chitiethoadons` (
  `bill_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `bill_key` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethoadons`
--

INSERT INTO `chitiethoadons` (`bill_id`, `product_id`, `amount`, `bill_key`) VALUES
(4, 6, 1, 7),
(4, 34, 2, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucnang`
--

CREATE TABLE `chucnang` (
  `chucnang_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chucnang`
--

INSERT INTO `chucnang` (`chucnang_id`, `name`, `icon`) VALUES
(2, 'Sản Phẩm', 'pe-7s-note2'),
(3, 'Loại Sản Phẩm', 'pe-7s-diskette'),
(4, 'Thương Hiệu', 'pe-7s-wallet'),
(5, 'Quyền', 'pe-7s-id'),
(6, 'Nhân Viên', 'pe-7s-medal'),
(7, 'Khách Hàng', 'pe-7s-user'),
(8, 'Nhà Cung Cấp', 'pe-7s-users'),
(9, 'Hóa Đơn', 'pe-7s-credit'),
(10, 'Phiếu Kho', 'pe-7s-box1'),
(11, 'MAKETING', 'pe-7s-drawer'),
(12, 'Hỗ Trợ Khách Hàng', 'pe-7s-chat'),
(13, 'Thống Kê', 'pe-7s-display1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custommer`
--

CREATE TABLE `custommer` (
  `kh_user_id` int(11) NOT NULL,
  `money` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `custommer`
--

INSERT INTO `custommer` (`kh_user_id`, `money`, `user_id`) VALUES
(1, '10', 1),
(2, '10', 2),
(3, '10', 4),
(4, '0', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `heros`
--

CREATE TABLE `heros` (
  `id_hero` int(255) NOT NULL,
  `slogent` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `heros`
--

INSERT INTO `heros` (`id_hero`, `slogent`, `img`) VALUES
(1, 'Tích cực mua hàng để AnhThong dào cóa', '../asset/img/hero-1.jpg'),
(2, 'Deal Cực Khủng Rinh Quà Liền Tay', '../asset/img/hero-2.jpg'),
(3, 'Mua Sắm Không Lo Hết Tiền', '../asset/img/hero-3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadons`
--

CREATE TABLE `hoadons` (
  `bill_id` int(255) NOT NULL,
  `user_kh` int(255) NOT NULL,
  `user_nv` int(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date_receice` varchar(255) NOT NULL,
  `date_order` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadons`
--

INSERT INTO `hoadons` (`bill_id`, `user_kh`, `user_nv`, `phone`, `address`, `date_receice`, `date_order`, `total`, `status`) VALUES
(4, 2, 1, '0909090909', '239 Cao Đạt phường 4 quận 5 Thành Phố Hồ Chí Minh', '2023-03-31 01:43:24', '2023-03-09 00:00:00', '887000', '3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanphams`
--

CREATE TABLE `loaisanphams` (
  `product_type_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanphams`
--

INSERT INTO `loaisanphams` (`product_type_id`, `name`, `description`) VALUES
(1, 'Trang điểm', 'Gồm set trang điểm mắt, mặt, môi'),
(2, 'Dưỡng da', 'Gồm bộ rửa mặt, mặt nạ, dưỡng ẩm, dưỡng môi, chống nắng'),
(3, 'Cơ thể', 'Gồm dưỡng thể, sữa tắm'),
(4, 'Dưỡng tóc', 'Gồm dầu gội, dầu xả, tạo kiểu, dưỡng tóc'),
(5, 'Cọ và phụ kiện', 'Gồm cọ và bọt biển'),
(6, 'Nước hoa', 'Gồm những loại nước hoa cao cấp tới trung bình');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nccs`
--

CREATE TABLE `nccs` (
  `ncc_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nccs`
--

INSERT INTO `nccs` (`ncc_id`, `name`, `status`, `address`) VALUES
(1, 'SaiGon Cores', 1, 'Hồ Chí Minh'),
(2, 'Thường Mạnh Group', 1, 'Cần Thơ'),
(3, 'Công Thương Quận', 1, 'Trà Vinh'),
(4, 'DSla', 1, 'Tây Ninh'),
(5, 'Chang Xing Shou', 0, 'Trung Quốc'),
(6, 'Cty Thông', 1, 'Thông');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyens`
--

CREATE TABLE `quyens` (
  `permission_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `quyens`
--

INSERT INTO `quyens` (`permission_id`, `name`, `details`) VALUES
(1, 'Admin', 'qlSanPham-qlQuyen-qlNhanVien-qlKhachHang-qlNCC-qlNhapHang-qlMaketing-qlSupport-qlThongKe'),
(8, 'Quản Lý Kho', 'qlSanPham-qlHoaDon-qlNhapHang'),
(9, 'Nhân Viên Bán Hàng', 'xemSanPham-xemKhachHang-xemNCC-qlHoaDon');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanphams`
--

CREATE TABLE `sanphams` (
  `product_id` int(255) NOT NULL,
  `product_type_id` int(255) NOT NULL,
  `brand_id` int(255) NOT NULL,
  `name` varchar(150) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `price` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `use` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanphams`
--

INSERT INTO `sanphams` (`product_id`, `product_type_id`, `brand_id`, `name`, `amount`, `price`, `description`, `use`, `img`, `status`) VALUES
(1, 1, 1, 'Lustre Eyeshadow Base', '36', 200000, 'Sản phẩm kem lót mắt Lustre có kết cấu mỏng, nhẹ, dễ dàng tán đều trên mí mắt. Lustre Eyeshadow Base giúp giữ màu phấn mắt lên màu chuẩn và lâu trôi, đồng thời bảo vệ mắt khỏi hiện tượng bị kích ứng', 'Bôi một lớp mỏng sản phẩm lên vùng mí mắt bằng ngón tay hoặc cọ có đầu mỏng như Lustre Pro Makeup Brush E103 Eyeshadow Brush.Tán đều sản phẩm, đợi đến khi khô mới sử dụng phấn mắt', '../asset/image/sp0.jpg', 1),
(2, 1, 2, 'GOLDEN ROSE EYESHADOW PRIMER', '50', 167000, 'Golden Rose là một nhãn hiệu của tập đoàn Erkul Cosmetics đến từ Thổ Nhĩ Kỳ. Đây là một trong những tập đoàn mỹ phẩm lớn tại Châu Âu và nổi tiếng trên thế giới, chuyên cung cấp các loại mỹ phẩm chăm sóc mặt, mắt, môi, nails, tóc…. Erkul Cosmetics cũng nằm', 'Sử dụng trước khi make-up mắt, tán trực tiếp lên da - Sau khi được thoa lên mắt, kem primer sẽ mau chóng khô lại tạo finish trong mờ, vì vậy bạn đừng lo ngại mí mắt sẽ trở nên trơn bóng', '../asset/image/sp1.jpg', 1),
(3, 1, 3, 'Smashbox Cosmetics', '50', 255000, 'Smashbox Cosmetics là kem lót dành cho mắt thách thức mọi phong cách trang điểm mắt từ nhẹ nhàng, đơn giản đến ombre, màu khói cầu kỳ quyến rũ, sản phẩm vẫn giữ nguyên màu mắt đẹp của bạn suốt ngày dài. Kết cấu dạng kem mịn, có độ bám cao và dễ tán đều tr', 'Sau khi dưỡng ẩm, lấy một lượng kem vừa đủ tán đều khắp bầu mắt trước khi sử dụng phấn mắt.', '../asset/image/sp2.jpg', 1),
(4, 1, 4, 'Nars Smudge Proof Eyeshadow', '50', 510000, 'Thiết kế vỏ hộp là tông đen và sản phẩm có thiết kế cũng khá đơn giản với tông trắng đen chủ đạo nhưng rất dễ nhìn ra đặc trưng nhờ sự nổi bật của Logo NARS.Có nhiều tone màu lựa chọn chứa ít nhũ nhẹ. Kết cấu của kem lót khá mịn, như kiểu kem dưỡng.', 'Dùng cọ lấy lượng phấn mắt vừa đủ và đánh lên bầu mắt', '../asset/image/sp3.jpg', 1),
(5, 1, 5, 'BH Cosmetics Solar Flare', '50', 688000, 'Bảng phấn mắt BH Cosmetics Solar Flare là một trong ba bảng màu mắt chủ đề Vũ trụ của BH Cosmetics. Bộ sưu tập các gam màu vũ trụ lung linh, ấm áp giúp cho đôi mắt của bạn thêm tỏa sáng rực rỡ. Bảng màu nhiều sắc thái từ màu nude lì đến những gam màu nhũ ', 'Dùng cọ lấy lượng phấn mắt vừa đủ và đánh lên bầu mắt. Có thể làm ẩm cọ trước khi lấy phấn để màu lên đậm hơn.Có thể pha trộn màu để tạo nên màu mắt thật khác biệt.', '../asset/image/sp4.jpg', 1),
(6, 1, 5, 'BH Cosmetics Mini Zodiac', '50', 437000, 'BH Cosmetics Mini Zodiac Aquarius là bảng màu mắt lấy cảm hứng từ cung Bào Bình trong 12 cung hoàng đạo. 9 tông màu khác nhau với một loạt các sắc màu như nâu, nâu đậm, xanh...đến tông màu trắng ánh bạc giúp khơi gợi nên sự quyến rũ độc đáo của riêng bạn.', ' Dùng cọ lấy lượng phấn mắt vừa đủ và đánh lên bầu mắt.Có thể làm ẩm cọ trước khi lấy phấn để màu lên đậm hơn.Có thể pha trộn màu để tạo nên màu mắt thật khác biệt.', '../asset/image/sp5.jpg', 1),
(7, 1, 5, 'BH Cosmetics Blushing In Bali', '50', 669000, 'BH Cosmetics Blushing in Bali là bảng phấn má hồng và tạo khối lấy cảm hứng từ những hòn đảo đầy nắng của Bali. 6 màu phấn hồng và tạo khối của BH Cosmetic cho bạn tất cả những gam màu bạn tìm kiếm. Gồm 2 ô phấn má hồng tươi tắn dễ phối màu và 4 ô tạo khố', 'Chỉ lấy một lượng vừa đủ bám trên bề mặt lông của cọ dùng để đánh má hồng.Bắt đầu bằng cách đặt phấn má lên điểm cao nhất của gò má. Sau đó mỉm cười và quét cọ từ đỉnh ngoài của gò má (phía gần mũi) nhẹ nhàng kéo hướng về phía thái dương. Dùng cọ tán đều ', '../asset/image/sp6.jpg', 1),
(8, 1, 5, 'BH Cosmetics Zodiac Love Signs', '50', 714000, 'Bảng phấn mắt BH Cosmetics Zodiac Love Signs với 25 màu bao gồm 12 màu phấn mắt lì mịn, 12 màu phấn nhũ và 1 màu highlight sáng sẽ giúp đôi mắt bạn trông rực rỡ và sống động hơn bao giờ hết. 24 màu mắt trải dài từ các gam màu nóng đến lạnh và các màu thuộ', 'Dùng cọ lấy lượng phấn mắt vừa đủ và đánh lên bầu mắt.Có thể làm ẩm cọ trước khi lấy phấn để màu lên đậm hơn.Có thể pha trộn màu để tạo nên màu mắt thật khác biệt.', '../asset/image/sp7.jpg', 1),
(9, 1, 5, 'BH Cosmetics Foil Eyes', '50', 386000, 'Bảng màu mắt BH Cosmetics Foil Eyes gồm 28 gam màu metallic (kim loại); đây là một bộ sưu tập của sự hoàn hảo; đa chiều và đa sắc tố kim loại. Nó là sự kết hợp của tone neutrals và các loại đá ngọc trai, đá thạch anh lấp lánh đến màu ánh khói đem đến cho ', 'Dùng cọ lấy lượng phấn mắt vừa đủ và đánh lên bầu mắt.Có thể làm ẩm cọ trước khi lấy phấn để màu lên đậm hơn.Có thể pha trộn màu để tạo nên màu mắt thật khác biệt.', '../asset/image/sp8.jpg', 1),
(10, 1, 6, 'M.A.C EYE SHADOW X 15', '50', 3088000, 'M.A.C EYE SHADOW X 15 là bảng màu mắt gồm các tông màu bán chạy nhất của MAC gồm 15 ô màu full size với chất phấn vô cùng mịn mượt cho khả năng lên màu chuẩn, cực dễ tán trên da và có độ bám màu lên đến 12 tiếng.Thiết kế sang trọng, các tone màu dễ ', 'Nên dùng kem lót mắt trước khi sử dụng phấn mắt.Tán đều nhẹ nhàng, khéo léo bằng cọ trang điểm mắt.Sử dụng các tông màu từ sáng đến đậm để tạo khối và tạo điểm nổi bật.Bảo quản nơi khô ráo, thoáng mát. Tránh ánh nắng trực tiếp và nhiệt độ cao', '../asset/image/sp9.jpg', 1),
(11, 1, 7, 'MISSHA Signature Velvet Art', '50', 544000, 'Phấn mắt MISSHA Signature Velvet Art với tông màu cổ điển, là sự lựa chọn tuyệt vời cho các cô nàng theo phong cách retro.Tính năng làm đẹp của loại phẩn này rất hiệu quả. Sử dụng sản phẩm để trang điểm cho đôi mắt sẽ đem lại cho bạn cảm giác mềm mại, mịn', 'Màu phấn nền được dùng đầu tiên, các bạn phủ đều phấn mắt nền lên rộng gấp 2 lần mí mắt.Màu phấn chính (nhấn) được dùng tiếp theo, loại phấn này chỉ nên vẽ khoảng môt nửa mí mắt để tạo điểm nhấn chính cho đôi mắt. Màu phấn viền thì chỉ để vẽ viền mắt theo', '../asset/image/sp10.jpg', 1),
(12, 1, 1, 'LUSTRE PRO Volume Waterproof', '50', 240000, 'LUSTRE PRO Volume Waterproof sử dụng công nghệ đột phá Micro Fiber, giúp bao phủ từng sợi mi. Chỉ với một lần chuốt nhẹ, MLUSTRE PRO Volume Waterproof sẽ khiến hàng mi dày và cong vút tự nhiên. LUSTRE PRO Volume Waterproof không gây cảm giác nặng trĩu và ', ' Lăn chai giữa 2 lòng bàn tay để làm ấm Mascara (giúp Mascara ít bị vón cục khi sử dụng).Lấy cọ ra khỏi chai và lau bớt phần Mascara dư bằng khăn giấy.Chải cọ theo đường Ziczac từ chân mi đến ngọn mi.Sau khi chuốt qua một lượt, đợi khoảng 10 giây cho khô ', '../asset/image/sp11.jpg', 1),
(13, 1, 8, 'Innisfree Skinny Longlongcar', '50', 190000, 'Innisfree Skinny Longlongcar với đầu chải mi được thiết kế đặc biệt hình tam giác cực nhỏ chỉ có 2.5mm, giúp chổi chạm đến từng sợi mi nhỏ và ngắn nhất, chuốt tận được sâu trong chân mi. Nhờ thiết kế độc đáo này mà khi chuốt mi ít bị vón và dính các sợi m', 'Chải từ phía gốc mi theo hướng đi lên theo đường ziczac.Dựng đứng đầu chải và chải thêm phần mi ngắn ở đầu và đuôi mắt.Chải thêm phần lông mi dưới giúp mắt trông to và quyến rũ hơn', '../asset/image/sp12.jpg', 1),
(14, 1, 9, ' Sisley So Intense Mascara Deep', '50', 1359000, 'Sisley So Intense Mascara Deep mang đến cho bạn một hàng mi dày và dài trông thấy với hiệu quả ngay tức thì. Công thức độc đáo được bổ sung các peptide giàu vitamin giúp mi dày, dài và chắc khỏe hơn qua từng ngày. Các sắc tố màu siêu tinh khiết cung cấp m', 'Nên bâm mi trước để có hàng mi cong đẹp tự nhiên. Ấn nhẹ đầu chải vào gốc lông mi và nhẹ nhàng chuốt về phía ngọn, lặp lại động tác cho đến khi có được màu mascara bạn muốn.', '../asset/image/sp13.jpg', 1),
(15, 1, 10, 'Arcancil Paris Lash Hysteria', '50', 395000, 'Arcancil Paris Lash Hysteria là sản phẩm trang điểm được ưa chuộng của Arcancil Paris với đầu cọ 360 độ cùng với nhiều dưỡng chất tốt giúp cho mỗi sợi lông mi đều được bao phủ bởi lớp mascara mà không bị vón cục, khô mi khi trang điểm trong thời gian dài.', 'Chải Mascara bằng cách xoay cọ từ gốc đến đầu lông mi, bắt đầu từ góc bên trong đến góc ngoài của mắt. Áp dụng nhiều lớp đến khối lượng mong muốn: một lớp kem duy nhất cho một kết quả tự nhiên, nhiều lớp kem cho khối lượng tối đa và hiệu ứng lông mi dày c', '../asset/image/sp14.jpg', 1),
(16, 1, 7, 'MISSHA THE STYLE 4D MASCARA', '50', 153000, 'Thành phần chủ yếu là Botanical wax giúp bạn dễ dàng có hàng mi cong, đầy quyến rũ mà không hề có cảm giác cộm, bết dính hay vón cục. Đồng thời, cung cấp các dưỡng chất giúp bảo vệ làn mi luôn khỏe mạnh.Cây chải mi được thiết kế rất đặc biệt và tinh tế vớ', 'Lăn Chải mi The Style 4D Missha giữa 2 lòng bàn tay để làm ấm mascara để mascara ít bị vón cục khi sử dụng.Kẹp mi tạo dáng mi.Dùng mascara lấy đầu chổi, chải nhẹ nhàng lớp thứ nhất để khô.Có thể tiếp tục dùng kẹp mí tạo dáng lần 2, chải mascara lần 2, lặ', '../asset/image/sp15.jpg', 1),
(17, 1, 1, 'Lustre PRO Eyelash Curler', '50', 200000, 'Kẹp mi Lustre uốn cong mi mắt mà không làm gãy/rụng mi. Chất liệu thép không gỉ và cao su mềm giúp kẹp mi hoạt động lâu dài và không làm gãy mi.', 'Mở kẹp mi, đặt vào mí mắt theo đường cong tự nhiên của mí mắt sao cho lông mi nằm trên phần cao su của kẹp. Bấm nhẹ nhàng từ 2-3 lần. Bỏ kẹp mi, chuốt mascara. Lặp lại cho tới khi mi đạt độ cong mong muốn.', '../asset/image/sp16.jpg', 1),
(18, 1, 11, 'Buxom Lash Mascara', '50', 408000, 'Công thức giàu vitamin, giúp nuôi dưỡng từng sợi lông mi sâu tới tận gốc và chống vón cục. Thêm một điểm mạnh không thể không nhắc tới nữa là về thiết kế: Phần đầu cọ của Mascara Buxom Lash lõm vào giữa tương tự như chiếc đồng hồ cát giúp cho bạn có thể d', 'Dùng đầu cọ chuốt nhẹ chuốt mi Buxom Lash lên hai hàng lông mi ở hai bên mắt. Những sợi lông mi có cấu tạo dày hơn ở phần chân lông và mỏng dần về ngọn. Vì thế bạn có thể dùng đầu cọ để chuốt dày cho phần ngọn này trước. Đợi cho phần mascara đầu tiên khô ', '../asset/image/sp17.jpg', 1),
(19, 1, 12, 'Isehan Kiss Me Heroine Long', '50', 396000, 'Mascara Isehan Heroine Kiss Me Long có khả năng làm dày và dài mi cho những bạn có lông mi dày nhưng bị thẳng, khó làm cong mi.Luôn nằm trong top đầu các sản phẩm mascara được ưa thích nhất do người tiêu dùng bình chọn tại Nhật Bản. Sản phẩm Mascara Iseha', 'Chải từ phía gốc mi theo hướng đi lên theo đường ziczac.Dựng đứng đầu chải và chải thêm phần mi ngắn ở đầu và đuôi mắt.Chải thêm phần lông mi dưới giúp mắt trông to và quyến rũ hơn.Cuối ngày, tẩy trang với Speedy mascara remove, dùng bông tẩy trang thấm s', '../asset/image/sp18.jpg', 1),
(20, 1, 6, 'M.A.C Brushstroke Liner', '50', 669000, 'M.A.C Brushstroke Liner - Brushblack là bút kẻ mắt màu đen tuyền với đầu nhọn cực mảnh cùng khả năng giữ màu siêu đỉnh lên đến 24 giờ. Sản phẩm chứa công thức chống trôi cho bạn đôi mắt đẹp suốt ngày dài. Mặc dù chứa công thức chống trôi nhưng bạn vẫn có ', 'Bạn kẻ một đường từ giữa mắt đến đuôi mắt.Kẻ thêm một đường từ khóe mắt nối với đường ban đầu. Bước này giúp mắt bạn to tròn hơn.Kẻ vành trong của mắt. Bước này sẽ tạo hiệu ứng giúp lông mi dày hơn. Bạn đưa đầu bút xuống phần vành trong của mắt và kẻ một ', '../asset/image/sp19.jpg', 1),
(21, 1, 34, 'Dior Diorshow Pro Liner Bevel', '50', 775000, 'Kẻ mắt Dior Diorshow Pro Liner Bevel chính là một trong những niềm tự hào của thương hiệu Dior. Ưu điểm dễ nhận thấy nhất là phần đầu bút được thiết kế theo dạng xiên, trên nhọn dưới tù giúp cho người dùng có thể diều chỉnh động tác dễ dàng. Chúng cũng tạ', 'Sử dụng ngón tay căng nhẹ da phần mi mắt để kẻ dễ dàng hơn.Tay kia cầm bút kẻ một đường sát chân mi và hơi chếch lên ở phần đuôi mắt.Có thể tô thêm cho đến khi đạt được đường nét theo ý thích.Bảo quản sản phẩm ở nơi khô ráo, thoáng mát. Ta nên tránh để án', '../asset/image/sp20.jpg', 1),
(22, 1, 9, 'Sisley Phyto Khol Star Eyeliner 3', '50', 1081000, 'Sisley Phyto Khol Star Eyeliner 3 là chì kẻ mắt được đúc độc đáo có thể chứa các tinh thể ngọc trai tối đa, tăng cường độ bắt sáng của sản phẩm, tô điểm cho đôi mắt thêm lung linh huyền bí. Thành phần chứa tỷ lệ cao các loại dầu và sáp cho cảm giác lướt n', 'Kẻ sát viền mi để có một đôi mắt sắc nét.', '../asset/image/sp21.jpg', 1),
(23, 1, 9, 'Sisley Phyto-Khol Perfect Eyeliner 8', '50', 1081000, 'Sisley Phyto Khol Star Eyeliner 8 là chì kẻ mắt được đúc độc đáo có thể chứa các tinh thể ngọc trai tối đa, tăng cường độ bắt sáng của sản phẩm, tô điểm cho đôi mắt thêm lung linh huyền bí. Thành phần chứa tỷ lệ cao các loại dầu và sáp cho cảm giác lướt n', 'Kẻ sát viền mi để có một đôi mắt sắc nét.', '../asset/image/sp22.jpg', 1),
(24, 1, 13, 'MACQUEEN WATERPROOF PEN EYELINER', '50', 221000, 'Bút Kẻ Mắt MACQUEEN WATERPROOF PEN EYELINER với đầu cọ bút lông dễ điều chỉnh cho các đường kẻ mắt thật mỏng tự nhiên và sắc nét cá tính, đem đến đôi mắt to tròn, sắc nét làm nổi bật khuôn mặt bạn. Sản phẩm không bị trôi khi gặp nước, hoàn hảo cho việc sử', 'Dùng bút kẻ, đi nét viền ngoài mắt để tô lên vẻ đẹp của đôi mắt bạn. Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp và nhiệt độ cao', '../asset/image/sp23.jpg', 1),
(25, 1, 14, 'ECLIPSE- EYELINER LIGNE DIVINE', '50', 311000, 'Eclipse Colours là hãng mỹ phẩm cao cấp tại Pháp đã cho ra đời nhiều dòng mỹ phẩm trang điểm và các sản phẩm làm đẹp dành cho móng tay, móng chân... giúp tô điểm thêm vẻ đẹp của phái nữ. ECLIPSE - EYELINER LIGNE DIVINE: Bút chì kẻ mắt Eclipse chứa sáp làm', 'Dùng bút chì kẻ mặt kẻ theo đường viền mắt. Sao cho mỏng dần về phía cuối đuôi mắt để mang lại đôi mắt tinh tế và dịu dàng. Nếu muốn mắt to hơn, hãy dùng chì kẻ mắt kẻ 2/3 mi dưới, nếu viền cả mi trên và mi dưới sẽ làm cho mắt sắc nét hơn. Bảo quản nơi kh', '../asset/image/sp24.jpg', 1),
(26, 1, 1, 'Lustre Ultimate Eyeliner Professional Line', '50', 208000, 'Chì kẻ mắt của Lustre với đầu bút sáp mềm, dễ dàng trượt lên da cho đường kẻ mắt rõ nét và tự nhiên, đồng thời có nhiều lựa chọn về màu sắc, cho bạn thoả sức sáng tạo.', 'Bạn kẻ một đường từ giữa mắt đến đuôi mắt.Kẻ thêm một đường từ khóe mắt nối với đường ban đầu. Bước này giúp mắt bạn to tròn hơn.Kẻ vành trong của mắt. Bước này sẽ tạo hiệu ứng giúp lông mi dày hơn. Bạn đưa chì xuống phần vành trong của mắt và kẻ một đườn', '../asset/image/sp25.jpg', 1),
(27, 1, 1, 'Lustre Ultimate Eyeliner Professional Line Mini - Black', '50', 160000, 'Lustre Ultimate Eyeliner Professional Line Mini - Black - Chì kẻ mắt của Lustre với đầu bút sáp mềm, dễ dàng trượt lên da cho đường kẻ mắt rõ nét và tự nhiên.Với tông màu đen dễ dàng phối hợp cùng các kiểu makeup khác nhau sẽ tạo điểm nhấn cho đôi mắt.Ngo', 'Bạn kẻ một đường từ giữa mắt đến đuôi mắt.Kẻ thêm một đường từ khóe mắt nối với đường ban đầu. Bước này giúp mắt bạn to tròn hơn.Kẻ vành trong của mắt. Bước này sẽ tạo hiệu ứng giúp lông mi dày hơn. Bạn đưa chì xuống phần vành trong của mắt và kẻ một đườn', '../asset/image/sp26.jpg', 1),
(28, 1, 6, 'M.A.C Great Brows Brow Kit - TAUPE', '50', 1152000, 'Bột sẽ bám phủ vào lông mày cho đôi lông mày có màu sắc đẹp tự nhiên. Đường nét mềm mại, rõ ràng thay đổi toàn diện khuôn mặt.Sản phẩm có thành phần lành tính, an toàn cho da. Hạn chế gây kích ứng, bảo vệ và chăm sóc hàng chân mày hoàn hảo, thích hợp với ', 'Dùng cọ kèm theo chải đều chân mày rồi lấy cọ tán màu vẽ nhạt dần theo khuôn chân mày, bạn có thể chọn dùng 1 màu, hoặc cũng có thể phối hợp cả 3 màu với nhau (chia màu cho đầu mày và đường cong đuôi mày) rồi dùng ngón tay mix lại lần nữa để tạo hiệu ứng ', '../asset/image/sp27.jpg', 1),
(29, 1, 6, 'M.A.C VELUXE BROW LINER', '50', 669000, 'Chì kẻ chân mày M.A.C VELUXE BROW LINER được thiết kế nhỏ gọn, rất tiện dụng để mang đi khi đi học, đi làm hay đi du lịch. Bột phấn có màu sắc nhẹ nhàng tạo nên sự tự nhiên cho khuôn mặt khi sử dụng. Mặt khác, kẻ mày MAC Veluxe Brow Liner còn cò khả năng ', 'Xác định điểm đầu, đỉnh và đuôi chân mày. Đỉnh chân mày nằm trên 1 đường thẳng với khóe mũi và đầu mắt.Đỉnh chân mày được xác đinh là vị trí ở 2/3 chiều dài chân mày tính từ điểm đầu chân mày. Đuôi chân mày nằm trên cùng đường thẳng với khóe mũi và đuôi m', '../asset/image/sp28.jpg', 1),
(30, 1, 15, 'PETITE LAEL EYE BROW #EB008', '50', 102000, 'Petite Lael là dòng mỹ phẩm mới toanh đến từ Hàn Quốc vừa ra mắt đã khiến bao trái tim mê làm đẹp phải đổ liêu xiêu vì vẻ ngoài vô cùng đáng yêu, khác biệt với những màu sắc và thiết kế độc đáo. Nhỏ gọn, trẻ trung, dễ thương, Petite Lael còn ghi điểm với ', 'Dùng đầu cọ kẻ khuôn chân mày như ý sau đó tô đều vào những khoảng trống để có hàng chân mày đẹp sắc sảo.', '../asset/image/sp29.jpg', 1),
(31, 1, 1, 'Lustre Brow Pomade Professional Line - Poised Taupe', '50', 184000, 'Sản phẩm Kẻ Chân Mày dạng gel pomade giúp dễ dàng tạo hình cặp chân mày cùng với khả năng chống trôi và chống lem. Công thức đặc biệt lý tưởng cho da dầu cũng như trong thời tiết nhiệt đới.Màu Poised Taupe - Nâu Tự Nhiên trẻ trung phù hợp với đa số màu tó', 'Dùng đầu cọ Lustre Pro Makeup Brush E105 Brow Brush chấm nhẹ nhàng để lấy sản phẩm.Định hình khung chân mày và tán đều đường viền về đuôi chân mày', '../asset/image/sp30.jpg', 1),
(32, 1, 16, 'The BrowGal Eyebrow Pencil - Blond', '50', 621000, 'Được thiết kế và tạo hình cẩn thận để mô phỏng vẻ ngoài của tóc thật, Bút chì kẻ lông mày của BrowGal luôn trông tự nhiên và không nhúc nhích. Những cây bút chì có thể pha trộn này được làm từ gỗ tuyết tùng cho một cây chì cứng hơn mang lại hiệu ứng giống', 'Chuốt nhọn để dễ dàng phẩy sợi , tạo khuôn chân mày, kết hợp với bột tán chân màu để có hiệu quả tốt nhất.', '../asset/image/sp31.jpg', 1),
(33, 1, 1, 'Lustre Brow Defining Professional Line - Dark Taupe', '50', 208000, 'Lustre là thương hiệu xuất xứ từ Mỹ chuyên về các dòng trang điểm chuyên nghiệp với giá thành hợp lý cho những người yêu makeup. Sản xuất tại Hàn Quốc với công nghệ vượt trội, chì kẻ mày đầu tam giác của Lustre vô cùng dễ sử dụng kể cả cho những người mới', 'Dùng đầu cọ xoắn chuốt lông mày vào nếp.Dùng đầu chì phẩy từng sợi lông mày theo khuôn và hướng có sẵn. Nhẹ tay (nhạt màu) ở đầu lông mày, đậm dần về đuôi lông mày. Phẩy đuôi lông mày nhọn mảnh.', '../asset/image/sp32.jpg', 1),
(34, 1, 17, 'SPRING HEART EYEBROW PENCIL', '50', 225000, 'Ưu điểm của chì kẻ mày SPRING HEART EYEBROW PENCIL là bạn có thể tạo nên những đường kẻ thanh mảnh và sắc nét với chất chì mềm mịn, mà không làm tổn hại đến làn da. Ngoài ra, sản phẩm với khả năng kháng nước sẽ bảo vệ chân mày bạn không bị trôi bởi bã nhờ', 'Xác định dáng chân mày hợp với khuôn mặt sau đó kẻ khuôn và tô đều cho chân mày.', '../asset/image/sp33.jpg', 1),
(35, 1, 18, 'Muji Mild Eye Make Up Remover', '50', 388000, 'Muji Mild Eye Make Up Remover nhẹ nhàng loại bỏ trang điểm mắt trên da nhạy cảm như mắt và môi mà không có cảm giác dính. Sản phẩm có thành phần chính là dầu ô liu, chiết xuất Chamomile, chiết xuất lá đào, thành phần dưỡng ẩm tự nhiên và thành phần dưỡng ', 'Lắc đều trước khi sử dụng.Cho một lượng sản phẩm cỡ đồng xu lên cotton pad, áp trên vùng trang điểm mắt và môi trong vài giây rồi lau nhẹ nhàng.', '../asset/image/sp34.jpg', 1),
(36, 1, 19, 'Lashfood Conditioning Collagen Lash Primer', '50', 230000, '...', 'Bôi lên mặt', '../asset/image/sp35.jpg', 1),
(37, 1, 20, 'Milk Hydra Grip Primer', '50', 150000, 'Kem lót cấp ẩm MILK MAKEUP Hydro Grip Primer là một sản phẩm kem lót không chứa silicone - thành phần dễ gây nên tắc nghẽn lỗ chân lông, kem dạng gel trong đầy dưỡng chất sẽ giúp da ẩm mịn hơn trông thấy.Kem lót đem lại cảm giác như bạn đang sử dụng một l', 'Bôi lên mặt', '../asset/image/sp36.jpg', 1),
(38, 1, 7, 'MISSHA VELVET FINISH CUSHION', '50', 261000, 'Khi thoa lên da, phấn có lớp mỏng nhẹ tự nhiên không bệt dính khó chịu trong quá trình dùng. Không tạo độ bóng dầu sau khi sử dụng. Tạo cho bạn sự thoải mái khí sử dụng điện thoại mà không còn dấu dính lại.MISSHA VELVET FINISH CUSHION ẽ là lớp màng bảo vệ', 'Lấy 1 lượng vừa vủ, dùng bông tẩy trang đánh đều lên bề mặt da.', '../asset/image/sp37.jpg', 1),
(39, 1, 8, 'Innisfree My To Go Cushion', '50', 554000, 'Chứa chiết xuất từ bột tro núi lửa đảo Jeju, hoa atiso và axit hyaluronic giúp tăng cường độ ẩm cho da.Chỉ số chống nắng cao với SPF35 PA++, mang đến cho người sử dụng cảm giác an toàn trong khi tham gia vào những hoạt động ngoài trời.Có độ che phủ tốt lấ', 'Ấn nút lấy sản phẩm ở rìa hộp cho đến khi lấy được lượng sản phẩm cần dùng, dùng bông cushion phân bổ đều phấn nước trên dĩa tán rồi bắt đầu dặm phấn nước lên mặt.Dặm nhẹ nhàng phấn từ phần má rồi di chuyển đến vùng trung tâm mặt.Gấp đôi bông cushion lại ', '../asset/image/sp38.jpg', 1),
(40, 1, 21, 'Laneige Layering Cover Cushion', '50', 665000, 'Độ che phủ cao và hiệu quả bền màu.Mang lại làn da đều màu và sáng hồng tự nhiên.Có thể điều chỉnh lớp nền lì hoặc sáng bóng tùy theo sở thích của bạn.Sản phẩm mang lại cảm giác ẩm mượt, không gây cảm giác khô, căng da.Chức năng kép: Kem che khuyết điểm: ', 'Sử dụng kem che khuyết điểm để che phủ những vùng da không hoàn hảo.Giúp gương mặt trở nên tươi sáng và hồng hào hơn khi dử dụng LANEIGE Layering Cover Cushion lên toàn bộ gương mặt', '../asset/image/sp39.jpg', 1),
(41, 1, 22, 'Guerlain Lingerie De Peau Liquid', '50', 1729000, 'Guerlain Lingerie De Peau Liquid là kem nền có khả năng che phủ hoàn hảo với chất kem lỏng dễ dàng lướt và tán đều trên da, công thức nhẹ nhàng cho lớp che phủ trông tự nhiên như làn da thứ hai, hòa quyện hoàn hảo với làn da bạn. Sản phẩm mang trong mình ', 'Trước khi dùng kem nền, bạn nên thoa một loại kem lót.Khi thoa kem nền, dùng mũi làm trọng tâm, thoa từ trong ra ngoài. Thoa vùng rộng trước, vùng hẹp sau. Sau đó, thoa thật nhẹ nhàng cho vùng mắt và môi.Nên thoa kem mỏng ở những vùng da quanh mắt và miện', '../asset/image/sp40.jpg', 1),
(42, 1, 23, 'Flawless Finish Everyday Perfection Bouncy Makeup', '50', 1270000, 'Đánh thức làn da hoàn hảo và tràn đầy sức sống với hộp phấn nén Elizabeth Arden với chất phấn nhẹ như không, nhanh chóng cung cấp năng lượng để trẻ hóa và phục hồi làn da tuổi thanh xuân của bạn. Các chất làm mát có trong sản phẩm giúp xoa dịu những làn d', 'Dùng bông lấy một lượng phấn vừa đủ và nhẹ nhàng tán đều lên mặt từ giữa ra xung quanh.Có thể dặm thêm ở các vùng cần che phủ nhiều hơn.Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp và nhiệt độ cao', '../asset/image/sp41.jpg', 1),
(43, 1, 9, 'Sisley Phyto Teint Expert', '50', 781000, 'Sisley Phyto Teint Expert là kem nền giúp da trắng sáng, đều màu, che khuyết điểm hiệu quả và giữ màu suốt 12h. Hơn nữa, sản phẩm còn có tinh chất dưỡng ẩm, chống lão hóa, mang lại làn da mềm mại, mịn màng hơn. Kem không chứa dầu, không gây nhờn dính, phù', 'Lấy một lượng vừa đủ ra tay, thoa nhẹ lên vùng da và cổ. Sử dụng sau các bước làm sạch da', '../asset/image/sp42.jpg', 1),
(44, 1, 9, 'Sisley Phyto-Fluid Foundation Oil', '50', 731000, 'Sisley Phyto-Fluid Foundation Oil là loại kem nền lâu trôi giúp da trắng sáng, đều màu, che khuyết điểm hiệu quả. Hơn nữa, sản phẩm còn có tinh chất dưỡng ẩm, chống lão hóa, mang lại làn da mềm mại, mịn màng hơn. Kem không chứa dầu, không gây nhờn dính, p', 'Lấy một lượng vừa đủ ra tay, thoa nhẹ lên vùng da và cổ. Sử dụng sau các bước làm sạch da', '../asset/image/sp43.jpg', 1),
(45, 1, 24, 'LOREAL INFALLIBLE Total Cover Foundation', '50', 270000, 'Sản phẩm có kết cấu dạng mouse mềm mịn, khi lên da sẽ tạo cảm giác nhẹ nhàng và vô cùng mượt mà vừa mỏng nhẹ lại thoải mái. Có khả năng che phủ và bền màu lên đến 24h, phù hợp với những người bận rộn không có thời gian dặm lại nhiều lần. Bổ sung chất dưỡn', 'Nhẹ nhàng tán đều kem nền lên da bằng mút hoặc cọ nền, tập trung vào vùng chữ T.', '../asset/image/sp44.jpg', 1),
(46, 1, 25, 'Eglips Apple Fit Blusher', '50', 171000, 'Eglips Apple Fit Blusher là phấn má hồng dạng nén khi đánh không bị vón cục cho bạn một màu má hồng thật đẹp. Hạt phấn siêu mịn có khả năng hấp thụ bã nhờn và hút mồ hôi đồng thời còn giúp che phủ khuyết điểm như lỗ chân lông to, da thiếu sức sống.., với ', 'Chỉ đánh vùng tròn giữa má tạo đôi má hồng dễ thương.Đánh phấn hơi xếch lên tạo gương mặt cô gái cá tính', '../asset/image/sp45.jpg', 1),
(47, 1, 25, 'Eglips Oil Cut Powder Pact', '50', 289000, 'Eglips Oil Cut Powder Pact là phấn phủ dạng nén với những hạt phấn sáng lấp lánh tạo một lớp phủ mịn màng cho khuôn mặt. Sản phẩm có khả năng kiểm soát dầu nhờn hiệu quả, mang lại làn da sạch mịn và duy trì lớp nền mịn nhẹ tự nhiên suốt cả ngày. Chiết xuấ', 'Sử dụng phấn nén phủ ở bước cuối cùng để hoàn tất lớp trang điểm, chú ý phủ kỹ ở những vùng bị dầu nhiều, tạo lớp trang điểm nhẹ nhàng hàng ngày.Bạn có thể xịt một lớp xịt khoáng trang điểm để lớp nền được bền màu khi hoạt động lâu ở ngoài trời.B', '../asset/image/sp46.jpg', 1),
(48, 1, 25, 'Eglips Glow Powder Pact', '50', 209000, 'Eglips Glow Powder Pact là phấn phủ dạng nén với những hạt phấn sáng lấp lánh tạo một lớp phủ mịn màng cho khuôn mặt. Sản phẩm có khả năng kiểm soát dầu nhờn hiệu quả, mang lại làn da sạch mịn và duy trì lớp nền mịn nhẹ tự nhiên suốt cả ngày, đồng thời là', 'Sử dụng phấn nén phủ ở bước cuối cùng để hoàn tất lớp trang điểm, chú ý phủ kỹ ở những vùng bị dầu nhiều, tạo lớp trang điểm nhẹ nhàng hàng ngày.Bạn có thể xịt một lớp xịt khoáng trang điểm để lớp nền được bền màu khi hoạt động lâu ở ngoài trời.B', '../asset/image/sp47.jpg', 1),
(49, 1, 5, 'Eglips Blur Powder Pact', '50', 209000, 'Phấn nén tự nhiên có màu, kềm dầu giúp che khuyết điểm và nhẹ nhàng làm tan biến những nỗi lo về da như nếp nhăn, lỗ chân lông to, da sần sùi, mang lại làn da láng mịn làm bạn cứ muốn chạm vào mãi. Công thức lecithin coating với độ bám dính phù hợp giúp d', 'Sử dụng phấn nén phủ ở bước cuối cùng để hoàn tất lớp trang điểm, chú ý phủ kỹ ở những vùng bị dầu nhiều, tạo lớp trang điểm nhẹ nhàng hàng ngày. Bạn có thể xịt một lớp xịt khoáng trang điểm để lớp nền được bền màu khi hoạt động lâu ở ngoài trời.', '../asset/image/sp48.jpg', 1),
(50, 1, 8, 'Innisfree No-Sebum Blur Powder', '50', 153000, 'Phấn phủ kiềm dầu, che khuyết điểm Innisfree No-sebum Blur Powder thuộc dòng mĩ phẩm hỗ trợ việc trang điểm, được thiết kế đặc biệt dành cho da nhạy cảm, da tiết quá nhiều dầu hoặc gặp rắc rối về mụn. Hướng đến đối tượng sử dụng là những người có làn da n', 'Dùng ở bước trang điểm cuối cùng hoặc khi da bóng nhờn. Dùng bông phấn lấy lượng vừa đủ và nhẹ nhàng tán đều lên da, cho đến khi phấn bao phủ hết khuôn mặt.', '../asset/image/sp49.jpg', 1),
(51, 1, 26, 'SILKYGIRL MAGIC BB OIL CONTROL', '50', 136000, 'Phấn phủ Silkygirl Magic BB Oil chứa chiết xuất cây cọ lùn và trái hồng giúp thấm hút dầu thừa và hạn chế tiết bã nhờn, cho làn da mịn màng, không còn bóng dầu đồng thời còn có khả năng chống nắng với SPF 45/PA++ giúp bảo vệ làn da dưới tác hại của ánh mặ', 'Dùng bông phấn đi kèm lấy một lượng phấn vừa đủ và dặm đều lên mặt. Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp và nhiệt độ cao', '../asset/image/sp50.jpg', 1),
(52, 1, 8, 'Innisfree No Sebum Mineral Powder', '50', 171000, 'Phấn Phủ Bột kiềm dầu Innisfree No Sebum Mineral Powder là loại phấn khoáng dạng bột, chiết xuất 100% từ bạc hà và hạt ngọc trai, có khả năng hút dầu rất tốt. Phấn có tông màu trong suốt nên rất dễ tiệp với tất cả các tone da và không ảnh hưởng đến tông m', 'Sau khi áp dụng lớp kem nền và hoàn thiện gương mặt bằng kem che khuyết điểm, bạn có thể sử dụng phấn phủ để kết thúc lớp nền. Dùng cọ nhúng bột phấn. Lắc nhẹ cọ cho bột phấn thừa rơi ra sau đó nhẹ nhàng phủ bầu mắt và toàn bộ gương mặt cho thật đều.', '../asset/image/sp51.jpg', 1),
(53, 1, 7, 'MISSHA The Style Defining Blusher', '50', 240000, 'Màu sắc hợp thời trang, tạo đường nét sống động tự nhiên cho khuôn mặt. Công nghệ Air Jet Mill tạo hạt phấn mịn đều bám nhẹ nhàng và mềm mại trên làn da và giữ cho lớp trang điểm bền màu. Chứa bột màu ngọc bích cho đường nét xinh đẹp tự nhiên, kết hợp cùn', 'Dùng sau khi hoàn thành các bước trang điểm. Dùng bông phấn hoặc cọ chấm một lượng vừa đủ để tạo độ hồng tự nhiên', '../asset/image/sp52.jpg', 1),
(54, 1, 1, 'lustre Pro Eyeshadow Magnetic Palette Case', '50', 157999, 'Một bảng màu phấn mắt 16 khe trống, có thể đổ lại, có thể được tùy chỉnh với chảo phấn mắt yêu thích của bạn.', 'Sử dụng bảng màu để lưu trữ Luster Pro Pressed của bạn.', '../asset/image/sp53.jpg', 1),
(55, 1, 27, 'Refillable Makeup Case', '50', 245000, 'Tùy chỉnh hộp trang điểm của riêng bạn.', 'Tùy chỉnh hộp trang điểm của riêng bạn.', '../asset/image/sp54.jpg', 1),
(56, 1, 1, 'LUSTRE MAKEUP', '50', 760000, 'Tùy chỉnh hộp trang điểm của riêng bạn.', 'Tùy chỉnh hộp trang điểm của riêng bạn.', '../asset/image/sp55.jpg', 1),
(57, 1, 9, 'Sisley Phyto-Blush Eclat - 4 Pinky Rose', '50', 250000, 'Siêu mịn chiết xuất thành phần từ ngọc trai, ánh nhũ lấp lánh đa năng vừa có thể làm highlight cho mặt vừa có thể làm nhũ mắt.Sử dụng trên mặt mộc để tạo hiệu ứng bắt sáng nhẹ nhàng , hoặc phủ lên lớp phấn phủ hoặc kem tạo khối yêu thích của bạn.', 'Đánh lớp phấn nền cho da trước khi sử dụng sản phẩm. Dùng miếng puff lấy phấn (hoặc dùng tay) tán lên phần xương gò má và kéo dài lên thái dương để khuôn mặt cân đối mà không cần dùng đến highlight.', '../asset/image/sp56.jpg', 1),
(58, 1, 28, 'Aritaum Sugar Ball Cushion Blusher - 01 Posy Pink', '50', 650000, 'Siêu mịn chiết xuất thành phần từ ngọc trai, ánh nhũ lấp lánh đa năng vừa có thể làm highlight cho mặt vừa có thể làm nhũ mắt.Sử dụng trên mặt mộc để tạo hiệu ứng bắt sáng nhẹ nhàng , hoặc phủ lên lớp phấn phủ hoặc kem tạo khối yêu thích của bạn.', 'Đánh lớp phấn nền cho da trước khi sử dụng sản phẩm. Dùng miếng puff lấy phấn (hoặc dùng tay) tán lên phần xương gò má và kéo dài lên thái dương để khuôn mặt cân đối mà không cần dùng đến highlight.', '../asset/image/sp57.jpg', 1),
(59, 1, 29, 'LOVE 3CE CHEEK MAKER', '50', 76000, 'Siêu mịn chiết xuất thành phần từ ngọc trai, ánh nhũ lấp lánh đa năng vừa có thể làm highlight cho mặt vừa có thể làm nhũ mắt.Sử dụng trên mặt mộc để tạo hiệu ứng bắt sáng nhẹ nhàng , hoặc phủ lên lớp phấn phủ hoặc kem tạo khối yêu thích của bạn.', 'Đánh lớp phấn nền cho da trước khi sử dụng sản phẩm. Dùng miếng puff lấy phấn (hoặc dùng tay) tán lên phần xương gò má và kéo dài lên thái dương để khuôn mặt cân đối mà không cần dùng đến highlight.', '../asset/image/sp58.jpg', 1),
(60, 1, 1, 'Lustre PRO Pressed Blush - Pink Nude', '50', 279000, 'Siêu mịn chiết xuất thành phần từ ngọc trai, ánh nhũ lấp lánh đa năng vừa có thể làm highlight cho mặt vừa có thể làm nhũ mắt.Sử dụng trên mặt mộc để tạo hiệu ứng bắt sáng nhẹ nhàng , hoặc phủ lên lớp phấn phủ hoặc kem tạo khối yêu thích của bạn.', 'Đánh lớp phấn nền cho da trước khi sử dụng sản phẩm. Dùng miếng puff lấy phấn (hoặc dùng tay) tán lên phần xương gò má và kéo dài lên thái dương để khuôn mặt cân đối mà không cần dùng đến highlight.', '../asset/image/sp59.jpg', 1),
(61, 1, 30, 'Kaleido Cosmetics Astrolight - Electric', '50', 740000, 'Siêu mịn chiết xuất thành phần từ ngọc trai, ánh nhũ lấp lánh đa năng vừa có thể làm highlight cho mặt vừa có thể làm nhũ mắt.Sử dụng trên mặt mộc để tạo hiệu ứng bắt sáng nhẹ nhàng , hoặc phủ lên lớp phấn phủ hoặc kem tạo khối yêu thích của bạn.', 'Đánh lớp phấn nền cho da trước khi sử dụng sản phẩm. Dùng miếng puff lấy phấn (hoặc dùng tay) tán lên phần xương gò má và kéo dài lên thái dương để khuôn mặt cân đối mà không cần dùng đến highlight.', '../asset/image/sp60.jpg', 1),
(62, 1, 31, 'Stila Glitter', '50', 300000, 'Siêu mịn chiết xuất thành phần từ ngọc trai, ánh nhũ lấp lánh đa năng vừa có thể làm highlight cho mặt vừa có thể làm nhũ mắt.Sử dụng trên mặt mộc để tạo hiệu ứng bắt sáng nhẹ nhàng , hoặc phủ lên lớp phấn phủ hoặc kem tạo khối yêu thích của bạn.', 'Đánh lớp phấn nền cho da trước khi sử dụng sản phẩm. Dùng miếng puff lấy phấn (hoặc dùng tay) tán lên phần xương gò má và kéo dài lên thái dương để khuôn mặt cân đối mà không cần dùng đến highlight.', '../asset/image/sp61.jpg', 1),
(63, 1, 1, 'Lustre Pro Eyeshadow Magnetic Palette Case', '50', 200000, 'Siêu mịn chiết xuất thành phần từ ngọc trai, ánh nhũ lấp lánh đa năng vừa có thể làm highlight cho mặt vừa có thể làm nhũ mắt.Sử dụng trên mặt mộc để tạo hiệu ứng bắt sáng nhẹ nhàng , hoặc phủ lên lớp phấn phủ hoặc kem tạo khối yêu thích của bạn.', 'Đánh lớp phấn nền cho da trước khi sử dụng sản phẩm. Dùng miếng puff lấy phấn (hoặc dùng tay) tán lên phần xương gò má và kéo dài lên thái dương để khuôn mặt cân đối mà không cần dùng đến highlight.', '../asset/image/sp62.jpg', 1),
(64, 1, 1, 'Pressed Highlighter - Sun Kissed', '50', 240000, 'Siêu mịn chiết xuất thành phần từ ngọc trai, ánh nhũ lấp lánh đa năng vừa có thể làm highlight cho mặt vừa có thể làm nhũ mắt.Sử dụng trên mặt mộc để tạo hiệu ứng bắt sáng nhẹ nhàng , hoặc phủ lên lớp phấn phủ hoặc kem tạo khối yêu thích của bạn.', 'Đánh lớp phấn nền cho da trước khi sử dụng sản phẩm. Dùng miếng puff lấy phấn (hoặc dùng tay) tán lên phần xương gò má và kéo dài lên thái dương để khuôn mặt cân đối mà không cần dùng đến highlight.', '../asset/image/sp63.jpg', 1),
(65, 1, 1, 'Pressed Bronzer - Salsa', '50', 94000, 'Siêu mịn chiết xuất thành phần từ ngọc trai, ánh nhũ lấp lánh đa năng vừa có thể làm highlight cho mặt vừa có thể làm nhũ mắt.Sử dụng trên mặt mộc để tạo hiệu ứng bắt sáng nhẹ nhàng , hoặc phủ lên lớp phấn phủ hoặc kem tạo khối yêu thích của bạn.', 'Đánh lớp phấn nền cho da trước khi sử dụng sản phẩm. Dùng miếng puff lấy phấn (hoặc dùng tay) tán lên phần xương gò má và kéo dài lên thái dương để khuôn mặt cân đối mà không cần dùng đến highlight.', '../asset/image/sp64.jpg', 1),
(66, 1, 32, 'Cover FX Contour Kit - Medium', '50', 349000, 'Siêu mịn chiết xuất thành phần từ ngọc trai, ánh nhũ lấp lánh đa năng vừa có thể làm highlight cho mặt vừa có thể làm nhũ mắt.Sử dụng trên mặt mộc để tạo hiệu ứng bắt sáng nhẹ nhàng , hoặc phủ lên lớp phấn phủ hoặc kem tạo khối yêu thích của bạn.', 'Đánh lớp phấn nền cho da trước khi sử dụng sản phẩm. Dùng miếng puff lấy phấn (hoặc dùng tay) tán lên phần xương gò má và kéo dài lên thái dương để khuôn mặt cân đối mà không cần dùng đến highlight.', '../asset/image/sp65.jpg', 1),
(67, 1, 33, 'Anastasia Beverly Hills Glow Kit - Ultimate Glow', '50', 349000, 'Màu sắc tỏa sáng giúp đôi môi trông căng mọng, và rạng rỡ. Độ bóng cao giúp đôi môi trông tươi tắn, mềm mại. Kết cấu mềm mại sẽ giữ cho đôi môi được dưỡng ẩm và thoải mái trong nhiều giờ. Lấy cảm hứng từ 10 loại màu đá tự nhiên sẽ mang lại may mắn cho đôi', 'Son dưỡng môi là loại son bạn có thể dùng mỗi ngày để bảo vệ cho đôi môi luôn căng mọng, khi thời tiết bắt đầu lạnh, hanh khô hay trước khi trang điểm chính là những lúc quan trọng bạn cần sử dụng đến son dưỡng môi.Trước khi tô son dưỡng môi, việc bạn cần', '../asset/image/sp66.jpg', 1),
(68, 1, 33, 'Anastasia Beverly Hills Contour Cream Kit', '50', 349000, 'Màu sắc tỏa sáng giúp đôi môi trông căng mọng, và rạng rỡ. Độ bóng cao giúp đôi môi trông tươi tắn, mềm mại. Kết cấu mềm mại sẽ giữ cho đôi môi được dưỡng ẩm và thoải mái trong nhiều giờ. Lấy cảm hứng từ 10 loại màu đá tự nhiên sẽ mang lại may mắn cho đôi', 'Son dưỡng môi là loại son bạn có thể dùng mỗi ngày để bảo vệ cho đôi môi luôn căng mọng, khi thời tiết bắt đầu lạnh, hanh khô hay trước khi trang điểm chính là những lúc quan trọng bạn cần sử dụng đến son dưỡng môi.Trước khi tô son dưỡng môi, việc bạn cần', '../asset/image/sp67.jpg', 1),
(69, 1, 21, 'Laneige Stained Glasstick', '50', 349000, 'Màu sắc tỏa sáng giúp đôi môi trông căng mọng, và rạng rỡ. Độ bóng cao giúp đôi môi trông tươi tắn, mềm mại. Kết cấu mềm mại sẽ giữ cho đôi môi được dưỡng ẩm và thoải mái trong nhiều giờ. Lấy cảm hứng từ 10 loại màu đá tự nhiên sẽ mang lại may mắn cho đôi', 'Son dưỡng môi là loại son bạn có thể dùng mỗi ngày để bảo vệ cho đôi môi luôn căng mọng, khi thời tiết bắt đầu lạnh, hanh khô hay trước khi trang điểm chính là những lúc quan trọng bạn cần sử dụng đến son dưỡng môi.Trước khi tô son dưỡng môi, việc bạn cần', '../asset/image/sp68.jpg', 1),
(70, 1, 8, 'Innisfree Glow Tint Lip Balm', '50', 349000, 'Màu sắc tỏa sáng giúp đôi môi trông căng mọng, và rạng rỡ. Độ bóng cao giúp đôi môi trông tươi tắn, mềm mại. Kết cấu mềm mại sẽ giữ cho đôi môi được dưỡng ẩm và thoải mái trong nhiều giờ. Lấy cảm hứng từ 10 loại màu đá tự nhiên sẽ mang lại may mắn cho đôi', 'Son dưỡng môi là loại son bạn có thể dùng mỗi ngày để bảo vệ cho đôi môi luôn căng mọng, khi thời tiết bắt đầu lạnh, hanh khô hay trước khi trang điểm chính là những lúc quan trọng bạn cần sử dụng đến son dưỡng môi.Trước khi tô son dưỡng môi, việc bạn cần', '../asset/image/sp69.jpg', 1),
(71, 1, 34, 'Dior Addict Lip Glow', '50', 349000, 'Màu sắc tỏa sáng giúp đôi môi trông căng mọng, và rạng rỡ. Độ bóng cao giúp đôi môi trông tươi tắn, mềm mại. Kết cấu mềm mại sẽ giữ cho đôi môi được dưỡng ẩm và thoải mái trong nhiều giờ. Lấy cảm hứng từ 10 loại màu đá tự nhiên sẽ mang lại may mắn cho đôi', 'Son dưỡng môi là loại son bạn có thể dùng mỗi ngày để bảo vệ cho đôi môi luôn căng mọng, khi thời tiết bắt đầu lạnh, hanh khô hay trước khi trang điểm chính là những lúc quan trọng bạn cần sử dụng đến son dưỡng môi.Trước khi tô son dưỡng môi, việc bạn cần', '../asset/image/sp70.jpg', 1),
(72, 1, 21, 'Laneige Lip Sleeping Mask', '50', 194000, 'Nhẹ nhàng loại bỏ lớp da môi bị khô, nứt nẻ, nuôi dưỡng và bảo vệ làn môi bạn bằng Vitamin E, Bơ Hạt Mỡ, các thành phần chiết xuất trong quả Lê, quả Nho, Hạt dầu Jojoba, và Sáp Copernicia Cerifera làm môi mềm mượt, tươi tắn và tràn đầy sức sống. Sản phẩm ', 'Có thể đáNh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp71.jpg', 1),
(73, 1, 35, 'Son Tẩy Da Chết Môi E.L.F Lip Exfoliator', '50', 752000, 'Nhẹ nhàng loại bỏ lớp da môi bị khô, nứt nẻ, nuôi dưỡng và bảo vệ làn môi bạn bằng Vitamin E, Bơ Hạt Mỡ, các thành phần chiết xuất trong quả Lê, quả Nho, Hạt dầu Jojoba, và Sáp Copernicia Cerifera làm môi mềm mượt, tươi tắn và tràn đầy sức sống. Sản phẩm ', 'Có thể đáNh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp72.jpg', 1),
(74, 1, 29, '3CE VELVET LIP TINT', '50', 927000, 'Nhẹ nhàng loại bỏ lớp da môi bị khô, nứt nẻ, nuôi dưỡng và bảo vệ làn môi bạn bằng Vitamin E, Bơ Hạt Mỡ, các thành phần chiết xuất trong quả Lê, quả Nho, Hạt dầu Jojoba, và Sáp Copernicia Cerifera làm môi mềm mượt, tươi tắn và tràn đầy sức sống. Sản phẩm ', 'Có thể đáNh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp73.jpg', 1),
(75, 1, 36, 'YSL Vinyl Cream Lip Stain', '50', 727000, 'Đầu cọ nhỏ nhắn, thon dài giúp dễ dàng thoa son. Son có độ lên màu rực rỡ từ lần lướt đầu tiên.Sau khi son khô lớp finish bắt dầu giảm độ bóng và trở nên mịn mượt hơn.Son cũng không gây cảm giác bết dính hay làm khô môi mà tạo cảm giác rất thoải mái.', 'Có thể đánh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp74.jpg', 1),
(76, 1, 37, 'Nars Velvet Lip Glide Le Pala', '50', 127000, 'Đầu cọ nhỏ nhắn, thon dài giúp dễ dàng thoa son. Son có độ lên màu rực rỡ từ lần lướt đầu tiên.Sau khi son khô lớp finish bắt dầu giảm độ bóng và trở nên mịn mượt hơn.Son cũng không gây cảm giác bết dính hay làm khô môi mà tạo cảm giác rất thoải mái.', 'Có thể đánh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp75.jpg', 1),
(77, 1, 21, 'Laneige Tattoo Lip Tint', '50', 1227000, 'Đầu cọ nhỏ nhắn, thon dài giúp dễ dàng thoa son. Son có độ lên màu rực rỡ từ lần lướt đầu tiên.Sau khi son khô lớp finish bắt dầu giảm độ bóng và trở nên mịn mượt hơn.Son cũng không gây cảm giác bết dính hay làm khô môi mà tạo cảm giác rất thoải mái.', 'Có thể đánh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp76.jpg', 1),
(78, 1, 8, 'Innisfree Vivid Oil Tint', '50', 927000, 'Đầu cọ nhỏ nhắn, thon dài giúp dễ dàng thoa son. Son có độ lên màu rực rỡ từ lần lướt đầu tiên.Sau khi son khô lớp finish bắt dầu giảm độ bóng và trở nên mịn mượt hơn.Son cũng không gây cảm giác bết dính hay làm khô môi mà tạo cảm giác rất thoải mái.', 'Có thể đánh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp77.jpg', 1),
(79, 1, 25, 'Eglips Velvet Fit Tint', '50', 327000, 'Đầu cọ nhỏ nhắn, thon dài giúp dễ dàng thoa son. Son có độ lên màu rực rỡ từ lần lướt đầu tiên.Sau khi son khô lớp finish bắt dầu giảm độ bóng và trở nên mịn mượt hơn.Son cũng không gây cảm giác bết dính hay làm khô môi mà tạo cảm giác rất thoải mái.', 'Có thể đánh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp78.jpg', 1),
(80, 1, 8, 'Innisfree Vivid Cotton Ink', '50', 627000, 'Đầu cọ nhỏ nhắn, thon dài giúp dễ dàng thoa son. Son có độ lên màu rực rỡ từ lần lướt đầu tiên.Sau khi son khô lớp finish bắt dầu giảm độ bóng và trở nên mịn mượt hơn.Son cũng không gây cảm giác bết dính hay làm khô môi mà tạo cảm giác rất thoải mái.', 'Có thể đánh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp79.jpg', 1),
(81, 1, 6, 'M.A.C RETRO MATTE LIQUID LIPCOLOUR', '50', 627000, 'Đầu cọ nhỏ nhắn, thon dài giúp dễ dàng thoa son. Son có độ lên màu rực rỡ từ lần lướt đầu tiên.Sau khi son khô lớp finish bắt dầu giảm độ bóng và trở nên mịn mượt hơn.Son cũng không gây cảm giác bết dính hay làm khô môi mà tạo cảm giác rất thoải mái.', 'Có thể đánh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp80.jpg', 1),
(82, 1, 7, 'MISSHA M Glossy Lip Rouge SPF13 GBE01', '50', 865000, 'Đầu cọ nhỏ nhắn, thon dài giúp dễ dàng thoa son. Son có độ lên màu rực rỡ từ lần lướt đầu tiên.Sau khi son khô lớp finish bắt dầu giảm độ bóng và trở nên mịn mượt hơn.Son cũng không gây cảm giác bết dính hay làm khô môi mà tạo cảm giác rất thoải mái.', 'Có thể đánh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp81.jpg', 1),
(83, 1, 38, 'Lime Crime DIAMOND CRUSHERS - Unicorn', '50', 207000, 'Đầu cọ nhỏ nhắn, thon dài giúp dễ dàng thoa son. Son có độ lên màu rực rỡ từ lần lướt đầu tiên.Sau khi son khô lớp finish bắt dầu giảm độ bóng và trở nên mịn mượt hơn.Son cũng không gây cảm giác bết dính hay làm khô môi mà tạo cảm giác rất thoải mái.', 'Có thể đánh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp82.jpg', 1),
(84, 1, 34, 'Dior Addict Lip Glow - 004 Coral', '50', 920000, 'Đầu cọ nhỏ nhắn, thon dài giúp dễ dàng thoa son. Son có độ lên màu rực rỡ từ lần lướt đầu tiên.Sau khi son khô lớp finish bắt dầu giảm độ bóng và trở nên mịn mượt hơn.Son cũng không gây cảm giác bết dính hay làm khô môi mà tạo cảm giác rất thoải mái.', 'Có thể đánh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp83.jpg', 1),
(85, 1, 19, 'Julep Lip Gloss - Lively', '50', 127000, 'Đầu cọ nhỏ nhắn, thon dài giúp dễ dàng thoa son. Son có độ lên màu rực rỡ từ lần lướt đầu tiên.Sau khi son khô lớp finish bắt dầu giảm độ bóng và trở nên mịn mượt hơn.Son cũng không gây cảm giác bết dính hay làm khô môi mà tạo cảm giác rất thoải mái.', 'Có thể đánh son dưới lớp son màu để tạo độ tươi tắn và sáng cho môi. Có thể chỉ cần đánh son dưỡng mà không cần dùng gì thêm cũng đủ làm cho khuôn mặt bừng sáng.', '../asset/image/sp84.jpg', 1),
(86, 1, 8, 'Innisfree Vivid Oil Tint - 5 Brown Cherry', '50', 182000, 'Chất chì mềm mượt, lâu trôi giúp định hình tạo cảm giác đôi môi thêm căng mọng hơn. Thành phần chứa vitamin E và bơ hạt mỡ giúp nuôi dưỡng đôi môi trong suốt thời gian sử dụng. Gồm nhiều tone màu thời trang, dễ dàng kết hợp nhiều màu son khác nhau.', 'Kẻ đường viền quanh môi trước khi thoa son tạo màu trong lòng môi', '../asset/image/sp85.jpg', 1),
(87, 1, 7, 'MISSHA Silky Lasting Lip Pencil', '50', 290000, 'Chất chì mềm mượt, lâu trôi giúp định hình tạo cảm giác đôi môi thêm căng mọng hơn. Thành phần chứa vitamin E và bơ hạt mỡ giúp nuôi dưỡng đôi môi trong suốt thời gian sử dụng. Gồm nhiều tone màu thời trang, dễ dàng kết hợp nhiều màu son khác nhau.', 'Kẻ đường viền quanh môi trước khi thoa son tạo màu trong lòng môi', '../asset/image/sp86.jpg', 1),
(88, 1, 26, 'SILKYGIRL LONG WEARING 05 WINE', '50', 627000, 'Chất chì mềm mượt, lâu trôi giúp định hình tạo cảm giác đôi môi thêm căng mọng hơn. Thành phần chứa vitamin E và bơ hạt mỡ giúp nuôi dưỡng đôi môi trong suốt thời gian sử dụng. Gồm nhiều tone màu thời trang, dễ dàng kết hợp nhiều màu son khác nhau.', 'Kẻ đường viền quanh môi trước khi thoa son tạo màu trong lòng môi', '../asset/image/sp87.jpg', 1),
(89, 1, 9, 'Sisley Phyto-Levres Perfect 5 Burgundy', '50', 123000, 'Chất chì mềm mượt, lâu trôi giúp định hình tạo cảm giác đôi môi thêm căng mọng hơn. Thành phần chứa vitamin E và bơ hạt mỡ giúp nuôi dưỡng đôi môi trong suốt thời gian sử dụng. Gồm nhiều tone màu thời trang, dễ dàng kết hợp nhiều màu son khác nhau.', 'Kẻ đường viền quanh môi trước khi thoa son tạo màu trong lòng môi', '../asset/image/sp88.jpg', 1),
(90, 1, 39, 'Tarte Tarteist Lip Crayon', '50', 1290000, 'Chất chì mềm mượt, lâu trôi giúp định hình tạo cảm giác đôi môi thêm căng mọng hơn. Thành phần chứa vitamin E và bơ hạt mỡ giúp nuôi dưỡng đôi môi trong suốt thời gian sử dụng. Gồm nhiều tone màu thời trang, dễ dàng kết hợp nhiều màu son khác nhau.', 'Kẻ đường viền quanh môi trước khi thoa son tạo màu trong lòng môi', '../asset/image/sp89.jpg', 1),
(91, 2, 38, 'Zelens Cleansing Liquid Balm', '50', 1900000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp90.jpg', 1),
(92, 2, 39, 'OKAME Peat Purifying Cleansing Water', '50', 297000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp91.jpg', 1),
(93, 2, 40, 'Byphasse Solution Micellaire', '50', 131000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp92.jpg', 1),
(94, 2, 41, 'Clinique Take The Day Off', '50', 227000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp93.jpg', 1),
(95, 2, 42, 'Bioderma Créaline H2O 250 ML', '50', 282000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp94.jpg', 1),
(96, 2, 42, 'Bioderma Créaline H2O 100 ML', '50', 200000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp95.jpg', 1),
(97, 2, 42, 'Bioderma Sebium H2O 100 Ml', '50', 127000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp96.jpg', 1),
(98, 2, 43, 'DHC Deep Cleansing Oil - 70 Ml', '50', 827000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp97.jpg', 1);
INSERT INTO `sanphams` (`product_id`, `product_type_id`, `brand_id`, `name`, `amount`, `price`, `description`, `use`, `img`, `status`) VALUES
(99, 2, 44, 'Mad Hippie Exfoliating Serum 30ml', '50', 627000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp98.jpg', 1),
(100, 2, 45, 'Huxley Spa Routine Kit', '50', 627000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp99.jpg', 1),
(101, 2, 46, 'Simple Clear Skin Oil Balancing Facial Scrub', '50', 187000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp100.jpg', 1),
(102, 2, 47, 'Slinky Touch Body Milk', '50', 292000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp101.jpg', 1),
(103, 2, 48, 'TSURU HANA HIME – Peeling cream for your nose', '50', 627000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp102.jpg', 1),
(104, 2, 43, 'PIXI Glow Mud Cleanser 135ml', '50', 627000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp103.jpg', 1),
(105, 2, 39, 'FRESH Soy Face Cleanser To Go Travel Size 50ml ', '50', 227000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp104.jpg', 1),
(106, 2, 42, 'Peter Thomas Roth Anti - Aging Cleansing Gel 18ml', '50', 621000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp105.jpg', 1),
(107, 2, 40, 'INDIE LEE Rosehip Cleanser 30ml', '50', 227000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp106.jpg', 1),
(108, 2, 18, 'Some By Mi AHA-BHA-PHA 30 Days Miracle Acne Clear Foam 100ml', '50', 877000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp107.jpg', 1),
(109, 2, 19, 'Mario Badescu Botanical Facial gel - 472ml', '50', 254000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp108.jpg', 1),
(110, 2, 19, 'Mario Badescu Enzyme Cleansing Gel - 236 ml', '50', 68000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp109.jpg', 1),
(111, 2, 39, 'Elta MD FOAMING FACIAL CLEANSER', '50', 327000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp110.jpg', 1),
(112, 2, 19, 'The Drunk Elephant Detective Game', '50', 643000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp111.jpg', 1),
(113, 2, 39, 'Naruko Tea Tree Blemish Clear Makeup Removing Cleansing Mousse 150 ml', '50', 60000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp112.jpg', 1),
(114, 2, 39, 'Naruko Tea Tree Purifying Clay Mask and Cleanser 3 in 1 120 gr', '50', 92000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp113.jpg', 1),
(115, 2, 8, 'Innisfree Green tea foam cleanser 150mL', '50', 127000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp114.jpg', 1),
(116, 2, 2, 'EMMA HARDIE SKINCARE Moringa Cleansing Balm with Cleansing Cloth ', '50', 622000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp115.jpg', 1),
(117, 2, 15, 'Paulas Choice Perfect Cleansing Oil', '50', 27000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp116.jpg', 1),
(118, 2, 9, 'Sisley Cleansing Milk With Sage 250ml', '50', 627000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp117.jpg', 1),
(119, 2, 25, 'Cosrx Low PH Good Morning Gel Cleanser 150 ml', '50', 267000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp118.jpg', 1),
(120, 2, 20, 'TWOSOME SET 3', '50', 2911000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp119.jpg', 1),
(121, 2, 39, 'Naruko RJT Supercritical CO2 Pore Minimizing and Brightening Lotion 150 ml', '50', 627000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp120.jpg', 1),
(122, 2, 49, 'PIXI Rose Tonic 100 ml', '50', 21000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp121.jpg', 1),
(123, 2, 49, 'PIXI Retinol Tonic 100 ml', '50', 87000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp122.jpg', 1),
(124, 2, 49, 'PIXI Vitamin C Tonic 100 ml', '50', 231000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp123.jpg', 1),
(125, 2, 20, 'Mario Badescu Glycolic Acid Toner - 236ml', '50', 127000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp124.jpg', 1),
(126, 2, 21, 'MAMONDE ROSE WATER TONER MINI SIZE 25ml', '50', 602000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp125.jpg', 1),
(127, 2, 49, 'PIXI Glow Tonic - 250ml', '50', 145000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp126.jpg', 1),
(128, 2, 35, 'Kiehls Calendula Herbal Extract Alcohol-Free Toner 40 ml', '50', 145000, 'Khai thác hiệu quả tuyệt vời của dầu tầm xuân giàu vitamin, sản phẩm có thể lấy đi lớp trang điểm mắt nhẹ nhàng, giúp làm dịu da để giúp giảm những dấu hiệu của sự lão hóa, đảm bảo độ ẩm và điều trị các vết đỏ . Sản phẩm nhẹ nhàng cho làn da nhạy cảm Hàm ', 'Thoa một lượng nhỏ sữa rửa mặt để mặt ẩm ướt. Sử dụng với một miếng bông ướt để loại bỏ trang điểm mắt. Rửa sạch hoàn toàn bằng nước. Không sử dụng với những vết thương hở', '../asset/image/sp127.jpg', 1),
(129, 2, 10, 'JMSOLUTION MARINE LUMINOUS PEARL DEEP BALANCING MASK 27ML', '50', 427000, 'Bắt đầu nổi lên như một thương hiệu mỹ phẩm cao cấp với các sản phẩm chăm sóc da chứa thành phần dầu hạt cây xương rồng- thương hiệu mỹ phẩm đến tứ xứ sở kim chi Hàn Quốc là một biểu tượng đương đại, khám phá những thành phần chưa được biết đến, hoàn thiệ', 'Sau khi làm sạch da mặt trải đều mặt nạ lên da rồi thư giãn 10~15 phút.  Bỏ lớp mặt nạ giấy ra rồi dùng tay vỗ nhẹ để dưỡng chất thẩm thấu tốt hơn vào da. Dùng toner và các bước dưỡng da tiếp theo mà không cần rửa lại với nước', '../asset/image/sp128.jpg', 1),
(130, 2, 50, 'Naruko RJT Pore Minimizing and Brightening Mask', '50', 621000, 'Bắt đầu nổi lên như một thương hiệu mỹ phẩm cao cấp với các sản phẩm chăm sóc da chứa thành phần dầu hạt cây xương rồng- thương hiệu mỹ phẩm đến tứ xứ sở kim chi Hàn Quốc là một biểu tượng đương đại, khám phá những thành phần chưa được biết đến, hoàn thiệ', 'Sau khi làm sạch da mặt trải đều mặt nạ lên da rồi thư giãn 10~15 phút.  Bỏ lớp mặt nạ giấy ra rồi dùng tay vỗ nhẹ để dưỡng chất thẩm thấu tốt hơn vào da. Dùng toner và các bước dưỡng da tiếp theo mà không cần rửa lại với nước', '../asset/image/sp129.jpg', 1),
(131, 2, 50, 'Naruko Tea Tree Shine Control and Blemish Clear Mask ', '50', 422000, 'Bắt đầu nổi lên như một thương hiệu mỹ phẩm cao cấp với các sản phẩm chăm sóc da chứa thành phần dầu hạt cây xương rồng- thương hiệu mỹ phẩm đến tứ xứ sở kim chi Hàn Quốc là một biểu tượng đương đại, khám phá những thành phần chưa được biết đến, hoàn thiệ', 'Sau khi làm sạch da mặt trải đều mặt nạ lên da rồi thư giãn 10~15 phút.  Bỏ lớp mặt nạ giấy ra rồi dùng tay vỗ nhẹ để dưỡng chất thẩm thấu tốt hơn vào da. Dùng toner và các bước dưỡng da tiếp theo mà không cần rửa lại với nước', '../asset/image/sp130.jpg', 1),
(132, 2, 45, 'Huxley Spa Routine Kit', '50', 132000, 'Bắt đầu nổi lên như một thương hiệu mỹ phẩm cao cấp với các sản phẩm chăm sóc da chứa thành phần dầu hạt cây xương rồng- thương hiệu mỹ phẩm đến tứ xứ sở kim chi Hàn Quốc là một biểu tượng đương đại, khám phá những thành phần chưa được biết đến, hoàn thiệ', 'Sau khi làm sạch da mặt trải đều mặt nạ lên da rồi thư giãn 10~15 phút.  Bỏ lớp mặt nạ giấy ra rồi dùng tay vỗ nhẹ để dưỡng chất thẩm thấu tốt hơn vào da. Dùng toner và các bước dưỡng da tiếp theo mà không cần rửa lại với nước', '../asset/image/sp131.jpg', 1),
(133, 2, 25, 'Mulbit Firming Sleeping Mask', '50', 421000, 'Bắt đầu nổi lên như một thương hiệu mỹ phẩm cao cấp với các sản phẩm chăm sóc da chứa thành phần dầu hạt cây xương rồng- thương hiệu mỹ phẩm đến tứ xứ sở kim chi Hàn Quốc là một biểu tượng đương đại, khám phá những thành phần chưa được biết đến, hoàn thiệ', 'Sau khi làm sạch da mặt trải đều mặt nạ lên da rồi thư giãn 10~15 phút.  Bỏ lớp mặt nạ giấy ra rồi dùng tay vỗ nhẹ để dưỡng chất thẩm thấu tốt hơn vào da. Dùng toner và các bước dưỡng da tiếp theo mà không cần rửa lại với nước', '../asset/image/sp132.jpg', 1),
(134, 2, 39, 'Mặt nạ lụa sinh học OKAME Bio - cellulose Mask - Set 5 Anti - aging Masks', '50', 42000, 'Bắt đầu nổi lên như một thương hiệu mỹ phẩm cao cấp với các sản phẩm chăm sóc da chứa thành phần dầu hạt cây xương rồng- thương hiệu mỹ phẩm đến tứ xứ sở kim chi Hàn Quốc là một biểu tượng đương đại, khám phá những thành phần chưa được biết đến, hoàn thiệ', 'Sau khi làm sạch da mặt trải đều mặt nạ lên da rồi thư giãn 10~15 phút.  Bỏ lớp mặt nạ giấy ra rồi dùng tay vỗ nhẹ để dưỡng chất thẩm thấu tốt hơn vào da. Dùng toner và các bước dưỡng da tiếp theo mà không cần rửa lại với nước', '../asset/image/sp133.jpg', 1),
(135, 2, 30, 'Kiehls Calendula & Aloe Soothing Hydration Masque 14ml', '50', 124000, 'Bắt đầu nổi lên như một thương hiệu mỹ phẩm cao cấp với các sản phẩm chăm sóc da chứa thành phần dầu hạt cây xương rồng- thương hiệu mỹ phẩm đến tứ xứ sở kim chi Hàn Quốc là một biểu tượng đương đại, khám phá những thành phần chưa được biết đến, hoàn thiệ', 'Sau khi làm sạch da mặt trải đều mặt nạ lên da rồi thư giãn 10~15 phút.  Bỏ lớp mặt nạ giấy ra rồi dùng tay vỗ nhẹ để dưỡng chất thẩm thấu tốt hơn vào da. Dùng toner và các bước dưỡng da tiếp theo mà không cần rửa lại với nước', '../asset/image/sp134.jpg', 1),
(136, 2, 21, 'Laneige Water Sleeping Mask 15ml', '50', 254000, 'Bắt đầu nổi lên như một thương hiệu mỹ phẩm cao cấp với các sản phẩm chăm sóc da chứa thành phần dầu hạt cây xương rồng- thương hiệu mỹ phẩm đến tứ xứ sở kim chi Hàn Quốc là một biểu tượng đương đại, khám phá những thành phần chưa được biết đến, hoàn thiệ', 'Sau khi làm sạch da mặt trải đều mặt nạ lên da rồi thư giãn 10~15 phút.  Bỏ lớp mặt nạ giấy ra rồi dùng tay vỗ nhẹ để dưỡng chất thẩm thấu tốt hơn vào da. Dùng toner và các bước dưỡng da tiếp theo mà không cần rửa lại với nước', '../asset/image/sp135.jpg', 1),
(137, 2, 19, 'Andalou Naturals Skin Food Mask, Avo Cocoa', '50', 523000, 'Bắt đầu nổi lên như một thương hiệu mỹ phẩm cao cấp với các sản phẩm chăm sóc da chứa thành phần dầu hạt cây xương rồng- thương hiệu mỹ phẩm đến tứ xứ sở kim chi Hàn Quốc là một biểu tượng đương đại, khám phá những thành phần chưa được biết đến, hoàn thiệ', 'Sau khi làm sạch da mặt trải đều mặt nạ lên da rồi thư giãn 10~15 phút.  Bỏ lớp mặt nạ giấy ra rồi dùng tay vỗ nhẹ để dưỡng chất thẩm thấu tốt hơn vào da. Dùng toner và các bước dưỡng da tiếp theo mà không cần rửa lại với nước', '../asset/image/sp136.jpg', 1),
(138, 2, 19, 'CHARLOTTE TILBURY Charlottes Magic Cream 30 ml', '50', 245000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp137.jpg', 1),
(139, 2, 39, 'OMOROVICZA REJUVENATING NIGHT CREAM 15ml', '50', 512000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp138.jpg', 1),
(140, 2, 52, 'Malin + Goetz Vitamin E Face Moisturizer 30ml', '50', 517000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp139.jpg', 1),
(141, 2, 43, 'AHC Capture White Solution Max Cream 50ml', '50', 651000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp140.jpg', 1),
(142, 2, 46, 'Some By Mi AHA BHA PHA 30 Days Miracle Cream', '50', 58000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp141.jpg', 1),
(143, 2, 51, 'Dermedic ANGIO PREVENTI NANO VIT C Active anti - wrinkle night cream ', '50', 767000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp142.jpg', 1),
(144, 2, 51, 'Sunday Riley Good Genes All in One Lactic Acid Treatment 50 ml', '50', 863000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp143.jpg', 1),
(145, 2, 41, 'Clinique iD™: Hydrating Jelly + Cartridge for Irritation 125ml', '50', 527000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp144.jpg', 1),
(146, 2, 41, 'Clinique iD™: Hydrating Jelly + Cartridge for Fatigue 125ml', '50', 727000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp145.jpg', 1),
(147, 2, 41, 'Clinique iD™: Oil - Control Gel + Cartridge for Pores & Uneven Texture 125ml', '50', 627000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp146.jpg', 1),
(148, 2, 10, 'Oribe Matte Waves Texture Lotion 15ml', '50', 327000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp147.jpg', 1),
(149, 2, 10, 'Dr.Dennis Gross Alpha Beta® Exfoliating Moisturizer(4 ml)', '50', 67000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp148.jpg', 1),
(150, 2, 52, 'MURAD Oil - Control Mattifier SPF 15 PA++', '50', 81000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp149.jpg', 1),
(151, 2, 45, 'Huxley Extra Moisture Duo Set', '50', 152000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp150.jpg', 1),
(152, 2, 45, 'Huxley Antioxidant Duo Set', '50', 182000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp151.jpg', 1),
(153, 2, 45, 'Huxley Cream ; More than Moist', '50', 282000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp152.jpg', 1),
(154, 2, 40, 'Neutrogena Hydro Boost Water Gel', '50', 627000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp153.jpg', 1),
(155, 2, 41, 'Clinique Dramatically Different Moisturising Gel with pump 125 ml', '50', 62500, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp154.jpg', 1),
(156, 2, 33, 'Mario Badescu Oil Free Moisturizer - 59 ml ', '50', 51000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp155.jpg', 1),
(157, 2, 50, 'Naruko Tea Tree Purifying Essential Oil 10 ml', '50', 612000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp156.jpg', 1),
(158, 2, 45, 'Huxley Extra Moisture Duo Set', '50', 253000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp157.jpg', 1),
(159, 2, 2, 'Andalou Naturals Argan Oil + Omega Natural Glow 3 in 1 Treatment', '50', 712000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp158.jpg', 1),
(160, 2, 45, 'HUXLEY OIL ; LIGHT AND MORE', '50', 832000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp159.jpg', 1),
(161, 2, 12, 'Radha Argan Oil', '50', 512000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp160.jpg', 1),
(162, 2, 44, 'Mad Hippie Face Cream 30ml', '50', 722000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', 'Sau khi làm sạch da bằng sữa rửa mặt , cân bằng da với toner  và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu lên toàn mặt, cổ và vùng hở ngực. Sản phẩm này chỉ dùng vào buổi sáng. Thế nên, bạn nên bổ sung kem dưỡng ẩm ', '../asset/image/sp161.jpg', 1),
(163, 2, 52, 'Balance Active Formula Dragons Blood Eye Cream 15ml', '50', 902000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', '-Dùng ngón áp út lấy kem và dặm nhẹ vùng trên, dọc theo hốc mắt và vùng xương chân mày từ trong ra ngoài theo 4 điểm ấn huyệt. Thoa nhẹ ở vùng dưới mắt, dọc theo hốc mắt từ trong ra ngoài theo 4 điểm ấn huyệt.', '../asset/image/sp162.jpg', 1),
(164, 2, 43, 'AHC ANGELESS REAL EYE CREAM FOR FACE 12ml', '50', 412000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', '-Dùng ngón áp út lấy kem và dặm nhẹ vùng trên, dọc theo hốc mắt và vùng xương chân mày từ trong ra ngoài theo 4 điểm ấn huyệt. Thoa nhẹ ở vùng dưới mắt, dọc theo hốc mắt từ trong ra ngoài theo 4 điểm ấn huyệt.', '../asset/image/sp163.jpg', 1),
(165, 2, 44, 'Mad Hippie Eye Cream 15ml', '50', 1411000, 'Là một trong những hãng có 100% thành phần chiết xuất từ thiên nhiên, giúp điều trị và xoa dịu làn da từ sâu trong lỗ chân lông. được thành lập từ những năm 2000 với chủ sở hữu thương hiệu là một nam beauty guru. như một thương hiệu mỹ phẩm cao cấp với cá', '-Dùng ngón áp út lấy kem và dặm nhẹ vùng trên, dọc theo hốc mắt và vùng xương chân mày từ trong ra ngoài theo 4 điểm ấn huyệt. Thoa nhẹ ở vùng dưới mắt, dọc theo hốc mắt từ trong ra ngoài theo 4 điểm ấn huyệt.', '../asset/image/sp164.jpg', 1),
(166, 2, 8, 'Innisfree Green Tea Mist 50 ml', '50', 617000, 'là những bác sĩ da liễu từng đoạt giải Nobel đã phát triển hệ thống thương hiệu Healing Concentrate ™ để cung cấp các khoáng chất trị liệu, mang lại một làn da trẻ trung hơn. Các sản phẩm chứa khoáng chất với các hoạt chất tự nhiên khác như làm sạch bùn đ', 'Xịt bất cứ lúc nào da cảm thấy khô và mệt mỏi. Xịt sau khi make up để lớp make up lâu trôi và bền đẹp.', '../asset/image/sp165.jpg', 1),
(167, 2, 30, 'Mario Badescu Facial Spray with Aloe, Herbs and Rosewater', '50', 1127000, 'là những bác sĩ da liễu từng đoạt giải Nobel đã phát triển hệ thống thương hiệu Healing Concentrate ™ để cung cấp các khoáng chất trị liệu, mang lại một làn da trẻ trung hơn. Các sản phẩm chứa khoáng chất với các hoạt chất tự nhiên khác như làm sạch bùn đ', 'Xịt bất cứ lúc nào da cảm thấy khô và mệt mỏi. Xịt sau khi make up để lớp make up lâu trôi và bền đẹp.', '../asset/image/sp166.jpg', 1),
(168, 2, 39, 'OMOROVICZA QUEEN OF HUNGARY MIST - 100 ml', '50', 533000, 'là những bác sĩ da liễu từng đoạt giải Nobel đã phát triển hệ thống thương hiệu Healing Concentrate ™ để cung cấp các khoáng chất trị liệu, mang lại một làn da trẻ trung hơn. Các sản phẩm chứa khoáng chất với các hoạt chất tự nhiên khác như làm sạch bùn đ', 'Xịt bất cứ lúc nào da cảm thấy khô và mệt mỏi. Xịt sau khi make up để lớp make up lâu trôi và bền đẹp.', '../asset/image/sp167.jpg', 1),
(169, 2, 30, 'Mario Badescu Facial Spray with Aloe, Cucumber and Green Tea 29ml', '50', 1327000, 'là những bác sĩ da liễu từng đoạt giải Nobel đã phát triển hệ thống thương hiệu Healing Concentrate ™ để cung cấp các khoáng chất trị liệu, mang lại một làn da trẻ trung hơn. Các sản phẩm chứa khoáng chất với các hoạt chất tự nhiên khác như làm sạch bùn đ', 'Xịt bất cứ lúc nào da cảm thấy khô và mệt mỏi. Xịt sau khi make up để lớp make up lâu trôi và bền đẹp.', '../asset/image/sp168.jpg', 1),
(170, 2, 50, 'Mario Badescu Acne Facial Cleanser - 177ml ', '50', 62000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp169.jpg', 1),
(171, 2, 14, 'Neutrogena Oil - Free Acne Wash - 269ml', '50', 621000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp170.jpg', 1),
(172, 2, 35, 'AHA 7 WHITEHEAD POWER LIQUID 100ML', '50', 52000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp171.jpg', 1),
(173, 2, 46, 'SUNDAY RILEY Flash Fix Kit', '50', 562000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp172.jpg', 1),
(174, 2, 38, 'ELEMIS Papaya Enzyme Peel 15ml', '50', 627000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp173.jpg', 1),
(175, 2, 52, 'So Natural Red Peel Tingle Serum', '50', 622000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp174.jpg', 1),
(176, 2, 41, 'Clinique iD™: Hydrating Jelly + Cartridge for Irritation 125ml', '50', 921000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp175.jpg', 1),
(177, 2, 41, 'Clinique iD™: Hydrating Jelly + Cartridge for Fatigue 125ml', '50', 757000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp176.jpg', 1),
(178, 2, 41, 'Clinique iD™: Hydrating Jelly + Cartridge for Lines & Wrinkles - Jelly 125ml', '50', 743000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp177.jpg', 1),
(179, 2, 51, 'Balance Active Formula Dragon’s Blood Lifting Serum 30ml', '50', 214000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp178.jpg', 1),
(180, 2, 36, 'Cosrx Galactomyces 95 Tone Balancing Essence', '50', 521000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp179.jpg', 1),
(181, 2, 46, 'Some By Mi 30 Days Miracle Tea Tree Clear Spot Oil 10ml', '50', 251000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp180.jpg', 1),
(182, 2, 47, 'Epiconce Intense Defense Serum 12ml', '50', 342000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp181.jpg', 1),
(183, 2, 51, 'Balance Active Formula Dragon’s Blood Lifting Serum 30ml', '50', 1154000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp182.jpg', 1),
(184, 2, 9, 'HYALURONIC ACID SERUM 100 % PURE 30ml', '50', 742000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp183.jpg', 1),
(185, 2, 19, 'Natural Red Peel Tingle Serum', '50', 522000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp184.jpg', 1),
(186, 2, 51, 'Balance Active Formula Gold Collagen Rejuvenating Eye Serum 15ml', '50', 521000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp185.jpg', 1);
INSERT INTO `sanphams` (`product_id`, `product_type_id`, `brand_id`, `name`, `amount`, `price`, `description`, `use`, `img`, `status`) VALUES
(187, 2, 51, 'Balance Active Formula Gold Collagen Rejuvenating Serum 30ml', '50', 767000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp186.jpg', 1),
(188, 2, 24, 'Dr.Dennis Gross Ferulic + Retinol Triple Corection Eye Serum 15ml', '50', 627000, 'Tinh chất với những thành phần chuyên biệt giúp da săn chắc hơn, tăng độ đàn hồi đồng thời giảm thiểu sự xuất hiện của những đường nhăn, làm mờ những nếp nhăn, phục hồi sức sống cho làn da và đem nét tươi trẻ đến cho từng đường nét trên gương mặt bạn.', 'Sau khi rửa mặt và lau khô, apply serum lên đều khắp mặt, massage nhẹ nhàng trên da cho đến khi serum chuyển từ màu đỏ sang tím, không để quá 10, rồi rửa lại với nước ấm.', '../asset/image/sp187.jpg', 1),
(189, 2, 42, 'Bioderma Atoderm Lèvres Stick Hydratant', '50', 627000, 'là loại son dưỡng môi dạng sáp đến từ thương hiệu cao cấp Choonee thuộc tập đoàn IKE của Hàn Quốc, là một nhãn hàng với hình tượng xuyên suốt là  Story of a girl from countryside - đem lại những sản phảm gần gũi với nguyên liệu chính từ tự nhiên. ', 'Trang điểm đôi môi trông tự nhiên bằng cách thoa lên toàn bộ môi dọc theo đường viền môi hoặc bằng cách thoa vào giữa môi.', '../asset/image/sp188.jpg', 1),
(190, 2, 49, 'Carmex Lip Balm Stick SPF 15', '50', 427000, 'là loại son dưỡng môi dạng sáp đến từ thương hiệu cao cấp Choonee thuộc tập đoàn IKE của Hàn Quốc, là một nhãn hàng với hình tượng xuyên suốt là  Story of a girl from countryside - đem lại những sản phảm gần gũi với nguyên liệu chính từ tự nhiên. ', 'Trang điểm đôi môi trông tự nhiên bằng cách thoa lên toàn bộ môi dọc theo đường viền môi hoặc bằng cách thoa vào giữa môi.', '../asset/image/sp189.jpg', 1),
(191, 2, 8, 'innisfree Glow tint lip balm 3.5g - 01', '50', 637000, 'là loại son dưỡng môi dạng sáp đến từ thương hiệu cao cấp Choonee thuộc tập đoàn IKE của Hàn Quốc, là một nhãn hàng với hình tượng xuyên suốt là  Story of a girl from countryside - đem lại những sản phảm gần gũi với nguyên liệu chính từ tự nhiên. ', 'Trang điểm đôi môi trông tự nhiên bằng cách thoa lên toàn bộ môi dọc theo đường viền môi hoặc bằng cách thoa vào giữa môi.', '../asset/image/sp190.jpg', 1),
(192, 2, 16, 'HOONEE WATERLIP TINT BALM - PINK GUAVA', '50', 874000, 'là loại son dưỡng môi dạng sáp đến từ thương hiệu cao cấp Choonee thuộc tập đoàn IKE của Hàn Quốc, là một nhãn hàng với hình tượng xuyên suốt là  Story of a girl from countryside - đem lại những sản phảm gần gũi với nguyên liệu chính từ tự nhiên. ', 'Trang điểm đôi môi trông tự nhiên bằng cách thoa lên toàn bộ môi dọc theo đường viền môi hoặc bằng cách thoa vào giữa môi.', '../asset/image/sp191.jpg', 1),
(193, 2, 23, 'Elizabeth Arden Eight Hour® Cream Intensive Moisture Hand Treatment 30ml', '50', 921000, 'là loại son dưỡng môi dạng sáp đến từ thương hiệu cao cấp Choonee thuộc tập đoàn IKE của Hàn Quốc, là một nhãn hàng với hình tượng xuyên suốt là  Story of a girl from countryside - đem lại những sản phảm gần gũi với nguyên liệu chính từ tự nhiên. ', 'Trang điểm đôi môi trông tự nhiên bằng cách thoa lên toàn bộ môi dọc theo đường viền môi hoặc bằng cách thoa vào giữa môi.', '../asset/image/sp192.jpg', 1),
(194, 3, 10, 'Dưỡng thể tẩy tế bào chết ALPHA SKINCARE - RENEWAL BODY LOTION WITH 12 % AHA, 12 OZ 340ml', '50', 777000, 'Với sự pha trộn giữ ẩm của sáp ong, dầu đậu phộng và dầu ngô làm cho chân tay mịn màng, mềm mại và sáng bóng sau khi bôi.', 'Sau khi làm sạch da bằng sữa rửa mặt (Clarifying Cleanser), cân bằng da với toner (Clarifying Toner) và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu Oil-Control Mattifier SPF 15 PA++ lên toàn mặt, cổ và vùng hở ngực. Sả', '../asset/image/sp193.jpg', 1),
(195, 3, 52, 'Mario Badescu summer shine body lotion 29 ml', '50', 927000, 'Với sự pha trộn giữ ẩm của sáp ong, dầu đậu phộng và dầu ngô làm cho chân tay mịn màng, mềm mại và sáng bóng sau khi bôi.', 'Sau khi làm sạch da bằng sữa rửa mặt (Clarifying Cleanser), cân bằng da với toner (Clarifying Toner) và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu Oil-Control Mattifier SPF 15 PA++ lên toàn mặt, cổ và vùng hở ngực. Sả', '../asset/image/sp194.jpg', 1),
(196, 3, 12, 'Molton Brown Bath & Shower Gel - Heavenly Gingerlily 30ml ', '50', 631000, 'Với sự pha trộn giữ ẩm của sáp ong, dầu đậu phộng và dầu ngô làm cho chân tay mịn màng, mềm mại và sáng bóng sau khi bôi.', 'Sau khi làm sạch da bằng sữa rửa mặt (Clarifying Cleanser), cân bằng da với toner (Clarifying Toner) và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu Oil-Control Mattifier SPF 15 PA++ lên toàn mặt, cổ và vùng hở ngực. Sả', '../asset/image/sp195.jpg', 1),
(197, 3, 48, 'Shiro Waki Hime Underarm Exfoliating & Brightening Cream', '50', 867000, 'Với sự pha trộn giữ ẩm của sáp ong, dầu đậu phộng và dầu ngô làm cho chân tay mịn màng, mềm mại và sáng bóng sau khi bôi.', 'Sau khi làm sạch da bằng sữa rửa mặt (Clarifying Cleanser), cân bằng da với toner (Clarifying Toner) và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu Oil-Control Mattifier SPF 15 PA++ lên toàn mặt, cổ và vùng hở ngực. Sả', '../asset/image/sp196.jpg', 1),
(198, 4, 13, 'Natural World Argan Oil of Morrocco Moisture Rich Shampoo 500ml', '50', 827000, 'Dầu Xả được chiết xuất từ tinh dầu Argan - thứ vàng lỏng quý hiếm từ Bắc Phi và một hỗn hợp cao cấp của 4 loại tinh dầu (hương thảo, xả, cam và ngọc lan tây Ylang Ylang).', 'Sau khi làm sạch da bằng sữa rửa mặt (Clarifying Cleanser), cân bằng da với toner (Clarifying Toner) và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu Oil-Control Mattifier SPF 15 PA++ lên toàn mặt, cổ và vùng hở ngực. Sả', '../asset/image/sp197.jpg', 1),
(199, 4, 30, 'SACHAJUAN Colour Protect Shampoo(100ml)', '50', 622000, 'Dầu Xả được chiết xuất từ tinh dầu Argan - thứ vàng lỏng quý hiếm từ Bắc Phi và một hỗn hợp cao cấp của 4 loại tinh dầu (hương thảo, xả, cam và ngọc lan tây Ylang Ylang).', 'Sau khi làm sạch da bằng sữa rửa mặt (Clarifying Cleanser), cân bằng da với toner (Clarifying Toner) và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu Oil-Control Mattifier SPF 15 PA++ lên toàn mặt, cổ và vùng hở ngực. Sả', '../asset/image/sp198.jpg', 1),
(200, 4, 13, 'Natural World Argan Oil of Morrocco Moisture Rich Conditioner 500ml', '50', 252000, 'Dầu Xả được chiết xuất từ tinh dầu Argan - thứ vàng lỏng quý hiếm từ Bắc Phi và một hỗn hợp cao cấp của 4 loại tinh dầu (hương thảo, xả, cam và ngọc lan tây Ylang Ylang).', 'Sau khi làm sạch da bằng sữa rửa mặt (Clarifying Cleanser), cân bằng da với toner (Clarifying Toner) và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu Oil-Control Mattifier SPF 15 PA++ lên toàn mặt, cổ và vùng hở ngực. Sả', '../asset/image/sp199.jpg', 1),
(201, 4, 12, 'John Masters Rosemary & Peppermint Detangler', '50', 521000, 'Dầu Xả được chiết xuất từ tinh dầu Argan - thứ vàng lỏng quý hiếm từ Bắc Phi và một hỗn hợp cao cấp của 4 loại tinh dầu (hương thảo, xả, cam và ngọc lan tây Ylang Ylang).', 'Sau khi làm sạch da bằng sữa rửa mặt (Clarifying Cleanser), cân bằng da với toner (Clarifying Toner) và cung cấp dưỡng chất với các sản phẩm điều trị , bạn thoa kem dưỡng kiểm soát dầu Oil-Control Mattifier SPF 15 PA++ lên toàn mặt, cổ và vùng hở ngực. Sả', '../asset/image/sp200.jpg', 1),
(202, 5, 4, 'Vasanti Eyeshadow Brush', '50', 655000, 'là hãng mỹ phẩm trang điểm chuyên nghiệp nổi tiếng trên thế giới với trụ sở chính đặt tại thành phố New York. Thương hiệu này được sáng lập bởi 2 người Canada là Frank Toskan và Frank Angelo. Năm 1991, công ty mở cửa hàng đầu tiên tại New York. Ban đầu th', 'Sử dụng cọ để tán phấn mắt màu sáng vào giữa bầu mắt như là 1 cách highlight cho mắt để làm mắt to hơn và sáng hơn', '../asset/image/sp201.jpg', 1),
(203, 5, 19, 'Morphe E3 Precision Pointed Powder Brush', '50', 541000, 'là hãng mỹ phẩm trang điểm chuyên nghiệp nổi tiếng trên thế giới với trụ sở chính đặt tại thành phố New York. Thương hiệu này được sáng lập bởi 2 người Canada là Frank Toskan và Frank Angelo. Năm 1991, công ty mở cửa hàng đầu tiên tại New York. Ban đầu th', 'Sử dụng cọ để tán phấn mắt màu sáng vào giữa bầu mắt như là 1 cách highlight cho mắt để làm mắt to hơn và sáng hơn', '../asset/image/sp202.jpg', 1),
(204, 5, 19, 'Morphe E3 Precision Pointed Powder Brush', '50', 1227000, 'là hãng mỹ phẩm trang điểm chuyên nghiệp nổi tiếng trên thế giới với trụ sở chính đặt tại thành phố New York. Thương hiệu này được sáng lập bởi 2 người Canada là Frank Toskan và Frank Angelo. Năm 1991, công ty mở cửa hàng đầu tiên tại New York. Ban đầu th', 'Sử dụng cọ để tán phấn mắt màu sáng vào giữa bầu mắt như là 1 cách highlight cho mắt để làm mắt to hơn và sáng hơn', '../asset/image/sp203.jpg', 1),
(205, 5, 13, 'M.A.C 210 Precise EyeLiner Brush', '50', 2427000, 'là hãng mỹ phẩm trang điểm chuyên nghiệp nổi tiếng trên thế giới với trụ sở chính đặt tại thành phố New York. Thương hiệu này được sáng lập bởi 2 người Canada là Frank Toskan và Frank Angelo. Năm 1991, công ty mở cửa hàng đầu tiên tại New York. Ban đầu th', 'Sử dụng cọ để tán phấn mắt màu sáng vào giữa bầu mắt như là 1 cách highlight cho mắt để làm mắt to hơn và sáng hơn', '../asset/image/sp204.jpg', 1),
(206, 5, 51, 'Lixibox Brush Net Guard Set 10 pcs', '50', 427000, 'là hãng mỹ phẩm trang điểm chuyên nghiệp nổi tiếng trên thế giới với trụ sở chính đặt tại thành phố New York. Thương hiệu này được sáng lập bởi 2 người Canada là Frank Toskan và Frank Angelo. Năm 1991, công ty mở cửa hàng đầu tiên tại New York. Ban đầu th', 'Sử dụng cọ để tán phấn mắt màu sáng vào giữa bầu mắt như là 1 cách highlight cho mắt để làm mắt to hơn và sáng hơn', '../asset/image/sp205.jpg', 1),
(207, 5, 51, 'Cọ Chikuhodo R - P6 Powder', '50', 627000, 'là hãng mỹ phẩm trang điểm chuyên nghiệp nổi tiếng trên thế giới với trụ sở chính đặt tại thành phố New York. Thương hiệu này được sáng lập bởi 2 người Canada là Frank Toskan và Frank Angelo. Năm 1991, công ty mở cửa hàng đầu tiên tại New York. Ban đầu th', 'Sử dụng cọ để tán phấn mắt màu sáng vào giữa bầu mắt như là 1 cách highlight cho mắt để làm mắt to hơn và sáng hơn', '../asset/image/sp206.jpg', 1),
(208, 5, 5, 'BH Cosmetics Sculpt and Blend 2 – 10 Piece Brush Set', '50', 511000, 'là hãng mỹ phẩm trang điểm chuyên nghiệp nổi tiếng trên thế giới với trụ sở chính đặt tại thành phố New York. Thương hiệu này được sáng lập bởi 2 người Canada là Frank Toskan và Frank Angelo. Năm 1991, công ty mở cửa hàng đầu tiên tại New York. Ban đầu th', 'Sử dụng cọ để tán phấn mắt màu sáng vào giữa bầu mắt như là 1 cách highlight cho mắt để làm mắt to hơn và sáng hơn', '../asset/image/sp207.jpg', 1),
(209, 5, 51, 'Lixibox Konjac Sponge', '50', 861000, 'là hãng mỹ phẩm trang điểm chuyên nghiệp nổi tiếng trên thế giới với trụ sở chính đặt tại thành phố New York. Thương hiệu này được sáng lập bởi 2 người Canada là Frank Toskan và Frank Angelo. Năm 1991, công ty mở cửa hàng đầu tiên tại New York. Ban đầu th', 'Sử dụng cọ để tán phấn mắt màu sáng vào giữa bầu mắt như là 1 cách highlight cho mắt để làm mắt to hơn và sáng hơn', '../asset/image/sp208.jpg', 1),
(210, 5, 43, 'Bông mút trang điểm The Duo Rain Drop', '50', 468000, 'là hãng mỹ phẩm trang điểm chuyên nghiệp nổi tiếng trên thế giới với trụ sở chính đặt tại thành phố New York. Thương hiệu này được sáng lập bởi 2 người Canada là Frank Toskan và Frank Angelo. Năm 1991, công ty mở cửa hàng đầu tiên tại New York. Ban đầu th', 'Sử dụng cọ để tán phấn mắt màu sáng vào giữa bầu mắt như là 1 cách highlight cho mắt để làm mắt to hơn và sáng hơn', '../asset/image/sp209.jpg', 1),
(211, 6, 53, 'Foellie Inner Perfume - Bijou', '50', 2227000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp210.jpg', 1),
(212, 6, 54, 'Jo Malone Oud & Bergamot Intense 9ml', '50', 1754000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp211.jpg', 1),
(213, 6, 54, 'Jo Malone Dark & Amber & Ginger Lily 9ml', '50', 2442000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp212.jpg', 1),
(214, 6, 54, 'Jo Malone Tuberose & Angelica 9ml', '50', 1278000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp213.jpg', 1),
(215, 6, 54, 'Jo Malone London Cologne Intense - Myrrh & Tonka 9ml', '50', 1422000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp214.jpg', 1),
(216, 6, 55, 'Diptyque LOmbre dans lEau Set', '50', 5222000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp215.jpg', 1),
(217, 6, 54, 'Jo Malone London Velvet Rose & Oud Cologne Intense', '50', 522000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp216.jpg', 1),
(218, 6, 57, 'LE LABO FLEUR DORANGER 27 eau de parfum - 50ml', '50', 2652000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp217.jpg', 1),
(219, 6, 57, 'LE LABO AMBRETTE 9 eau de parfum - 50ml', '50', 532000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp218.jpg', 1),
(220, 6, 55, 'DIPTYQUE Eau Duelle Eau de Parfum - 75ml', '50', 1667000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp219.jpg', 1),
(221, 6, 55, 'DIPTYQUE Fleur de Peau Eau de parfum - 75ml', '50', 5221000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp220.jpg', 1),
(222, 6, 55, 'DIPTYQUE Volutes Eau de Parfum - 75ml', '50', 1422000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp221.jpg', 1),
(223, 6, 55, 'DIPTYQUE Philosykos Eau de Parfum - 75ml', '50', 2342000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp222.jpg', 1),
(224, 6, 55, 'DIPTYQUE LOmbre Dans LEau Eau de Parfum - 75ml', '50', 4227000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp223.jpg', 1),
(225, 6, 55, 'Diptyque Eau Duelle Eau de Toilette - 50 ml', '50', 2242000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp224.jpg', 1),
(226, 6, 56, 'ATELIER COLOGNE Iris Rebelle Cologne Absolue Pure Perfume - 10 ml', '50', 1225000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp225.jpg', 1),
(227, 6, 54, 'Jo Malone Lime Basil & Mandarin Cologne 30ml', '50', 3266000, 'Một mẫu nước hoa mang mùi hương ngọt và phức tạp là một phần trong bộ sưu tập Intense Collection của  Jo Malone và đã được ra mắt vào năm 2010. Bộ sưu tập này được lấy cảm hứng từ nghi lễ thế tục ở vùng Trung Đông. Bộ sưu tập này là đứa con tinh thần của ', 'Hướng dẫn sử dụng: Làm ẩm miếng bọt biển rồi tạo bọt bằng sửa rửa mặt. Dùng miếng bọt biển mát xa trên da mặt theo hình tròn, tránh vùng mắt. Rửa sạch mặt và miếng bọt biển. Chú ý để miếng bọt biển ở nơi khô ráo sau khi sử dụng', '../asset/image/sp226.jpg', 1),
(229, 1, 3, 'thong', '23', 100000, 'thong', 'thong', '../uploads/tkb.png', 1),
(230, 1, 13, 'thong', '39', 2147483647, '1111', '1111', '../uploads/326055982_2374745402703209_3893378573403450045_n.jpg', 1),
(231, 1, 1, 'ThongTest', '123', 123, '123', '123', '../uploads/sale.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `nv_user_id` int(11) NOT NULL,
  `accede` varchar(255) NOT NULL,
  `salary` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`nv_user_id`, `accede`, `salary`, `user_id`, `permission_id`) VALUES
(1, '2023-1-11 00:00:00', '20000000', 3, 1),
(3, '2023-1-11 00:00:00', '20000000', 6, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuonghieus`
--

CREATE TABLE `thuonghieus` (
  `brand_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thuonghieus`
--

INSERT INTO `thuonghieus` (`brand_id`, `name`) VALUES
(1, 'LUSTRE MAKEUP'),
(2, 'Golden Rose'),
(3, 'SmashBox'),
(4, 'Medium'),
(5, 'BH Cosmetics'),
(6, 'M.A.C Cosmetics'),
(7, 'Missha'),
(8, 'Innisfree'),
(9, 'Sisley Paris'),
(10, 'ARCANCIL PARIS'),
(11, 'Buxom Cosmetics'),
(12, 'Isehan'),
(13, 'MacQueen'),
(14, 'Eclipse Colours'),
(15, 'PETITE LAEL'),
(16, 'THE BROWGAL'),
(17, 'Dolly Wink'),
(18, 'Muji'),
(19, 'United States'),
(20, 'Milk'),
(21, 'Laneige'),
(22, 'Guerlain'),
(23, 'Elizabeth Arden'),
(24, 'L’oreal'),
(25, 'Eglips'),
(26, 'SILKYGIRL'),
(27, 'STATISFY'),
(28, 'Aritaum'),
(29, '3CE'),
(30, 'Kaleido Cosmetics'),
(31, 'Stila Cosmetics'),
(32, 'Cover Fx'),
(33, 'Anastasia Beverly Hills'),
(34, 'Dior'),
(35, 'E.L.F'),
(36, 'Yves Saint Laurent'),
(37, 'Nars'),
(38, 'Lime Crime'),
(39, 'Tarte'),
(40, 'Byphasse'),
(41, 'Clinique'),
(42, 'Bioderma'),
(43, 'DHC'),
(44, 'Mad Hippie'),
(45, 'Huxley'),
(46, 'Simple'),
(47, 'Dinky Touch'),
(48, 'Shiro Waki Hime'),
(49, 'Pixi'),
(50, 'Naruko'),
(51, 'LIXIBOX'),
(52, 'UK'),
(53, 'Foellie'),
(54, 'Jo Malone London'),
(55, 'Diptyque'),
(56, 'Atelier Cologne'),
(57, 'LE LABON');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accountrefchucnang`
--
ALTER TABLE `accountrefchucnang`
  ADD KEY `chucnang_id` (`chucnang_id`),
  ADD KEY `accountrefchucnang_ibfk_1` (`permission_id`);

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `fk_carts_khachhangs` (`user_id`),
  ADD KEY `fk_carts_sanphams` (`product_id`);

--
-- Chỉ mục cho bảng `chitiethoadons`
--
ALTER TABLE `chitiethoadons`
  ADD PRIMARY KEY (`bill_key`),
  ADD KEY `fk_chitiethoadons_hoadons` (`bill_id`),
  ADD KEY `fk_chitiethoadons_sanphams` (`product_id`);

--
-- Chỉ mục cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  ADD PRIMARY KEY (`chucnang_id`);

--
-- Chỉ mục cho bảng `custommer`
--
ALTER TABLE `custommer`
  ADD PRIMARY KEY (`kh_user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `heros`
--
ALTER TABLE `heros`
  ADD PRIMARY KEY (`id_hero`);

--
-- Chỉ mục cho bảng `hoadons`
--
ALTER TABLE `hoadons`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `user_kh` (`user_kh`),
  ADD KEY `user_nv` (`user_nv`);

--
-- Chỉ mục cho bảng `loaisanphams`
--
ALTER TABLE `loaisanphams`
  ADD PRIMARY KEY (`product_type_id`);

--
-- Chỉ mục cho bảng `nccs`
--
ALTER TABLE `nccs`
  ADD PRIMARY KEY (`ncc_id`);

--
-- Chỉ mục cho bảng `quyens`
--
ALTER TABLE `quyens`
  ADD PRIMARY KEY (`permission_id`);

--
-- Chỉ mục cho bảng `sanphams`
--
ALTER TABLE `sanphams`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_sanphams_loaisanphans` (`product_type_id`),
  ADD KEY `fk_sanphams_thuonghieus` (`brand_id`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`nv_user_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `staff_ibfk_2` (`permission_id`);

--
-- Chỉ mục cho bảng `thuonghieus`
--
ALTER TABLE `thuonghieus`
  ADD PRIMARY KEY (`brand_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `chitiethoadons`
--
ALTER TABLE `chitiethoadons`
  MODIFY `bill_key` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `chucnang`
--
ALTER TABLE `chucnang`
  MODIFY `chucnang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `custommer`
--
ALTER TABLE `custommer`
  MODIFY `kh_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `heros`
--
ALTER TABLE `heros`
  MODIFY `id_hero` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `hoadons`
--
ALTER TABLE `hoadons`
  MODIFY `bill_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loaisanphams`
--
ALTER TABLE `loaisanphams`
  MODIFY `product_type_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `nccs`
--
ALTER TABLE `nccs`
  MODIFY `ncc_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `quyens`
--
ALTER TABLE `quyens`
  MODIFY `permission_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `sanphams`
--
ALTER TABLE `sanphams`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `nv_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thuonghieus`
--
ALTER TABLE `thuonghieus`
  MODIFY `brand_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `accountrefchucnang`
--
ALTER TABLE `accountrefchucnang`
  ADD CONSTRAINT `accountrefchucnang_ibfk_1` FOREIGN KEY (`permission_id`) REFERENCES `quyens` (`permission_id`),
  ADD CONSTRAINT `accountrefchucnang_ibfk_2` FOREIGN KEY (`chucnang_id`) REFERENCES `chucnang` (`chucnang_id`);

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `fk_carts_khachhangs` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`user_id`),
  ADD CONSTRAINT `fk_carts_sanphams` FOREIGN KEY (`product_id`) REFERENCES `sanphams` (`product_id`);

--
-- Các ràng buộc cho bảng `chitiethoadons`
--
ALTER TABLE `chitiethoadons`
  ADD CONSTRAINT `chitiethoadons_ibfk_1` FOREIGN KEY (`bill_id`) REFERENCES `hoadons` (`bill_id`),
  ADD CONSTRAINT `chitiethoadons_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sanphams` (`product_id`);

--
-- Các ràng buộc cho bảng `custommer`
--
ALTER TABLE `custommer`
  ADD CONSTRAINT `custommer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`user_id`);

--
-- Các ràng buộc cho bảng `hoadons`
--
ALTER TABLE `hoadons`
  ADD CONSTRAINT `hoadons_ibfk_1` FOREIGN KEY (`user_kh`) REFERENCES `custommer` (`kh_user_id`),
  ADD CONSTRAINT `hoadons_ibfk_2` FOREIGN KEY (`user_nv`) REFERENCES `staff` (`nv_user_id`);

--
-- Các ràng buộc cho bảng `sanphams`
--
ALTER TABLE `sanphams`
  ADD CONSTRAINT `fk_sanphams_loaisanphans` FOREIGN KEY (`product_type_id`) REFERENCES `loaisanphams` (`product_type_id`),
  ADD CONSTRAINT `fk_sanphams_thuonghieus` FOREIGN KEY (`brand_id`) REFERENCES `thuonghieus` (`brand_id`);

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `accounts` (`user_id`),
  ADD CONSTRAINT `staff_ibfk_2` FOREIGN KEY (`permission_id`) REFERENCES `quyens` (`permission_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
