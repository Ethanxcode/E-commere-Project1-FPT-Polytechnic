/**
 * @param {number} n
 * @return {number}
 */

var arrangeCoins = function (n) {
	let count = 0;
	for (let i = 1; i <= n; i++) {
		n -= i;
		if (n >= 0) {
			count++;
		}
	}
	return count;
};

var arrangeCoins = function (n) {
	let l = 1;
	let r = n;
	let res = 0;
	while (l <= r) {
		let mid = Math.floor((l + r) / 2);
		let coins = (mid / 2) * (mid + 1);
		if (coins > n) {
			r = mid - 1;
		} else {
			l = mid + 1;
			res = Math.max(res, mid);
		}
	}
	return res;
};
