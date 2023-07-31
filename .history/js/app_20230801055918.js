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
<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Lấy đối tượng input số lượng
        var quantityInput = document.getElementById("quantityInput");

        // Gắn sự kiện onchange vào input số lượng
        quantityInput.addEventListener("change", function () {
            // Submit form khi số lượng thay đổi
            this.closest("form").submit();
        });
    });
</script>