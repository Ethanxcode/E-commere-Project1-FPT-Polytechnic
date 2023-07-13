// document.querySelectorAll('.dropdown > a').forEach(e => {
//     e.addEventListener('click', (event) => event.preventDefault())
// })

// document.querySelectorAll('.mega-dropdown > a').forEach(e => {
//     e.addEventListener('click', (event) => event.preventDefault())
// })

document
	.querySelector('#mb-menu-toggle')
	.addEventListener('click', () =>
		document.querySelector('#header-wrapper').classList.add('active'),
	);

document
	.querySelector('#mb-menu-close')
	.addEventListener('click', () =>
		document.querySelector('#header-wrapper').classList.remove('active'),
	);


    function applyCoupon() {
        var couponCode = document.getElementsByName('couponCode')[0].value;

        // Tạo yêu cầu POST với fetch
        fetch(window.location.href, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'couponCode=' + couponCode
        })
            .then(function (response) {
                if (response.ok) {
                    return response.json();
                } else {
                    throw new Error('Lỗi kết nối máy chủ');
                }
            })
            .then(function (data) {
                // Xử lý kết quả từ máy chủ
                if (data.isValid) {
                    var discountAmount = data.discountAmount;
                    var totalPrice = parseFloat(<?php echo $tongSp; ?>);
                    var newTotalPrice = totalPrice - discountAmount;
                    document.getElementById('total_price').innerText = newTotalPrice.toFixed(2);
                } else {
                    alert(data.errorMessage);
                }
            })
            .catch(function (error) {
                alert(error.message);
            });
    }