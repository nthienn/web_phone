let listDivImg = document.querySelectorAll('.banner-list-img div')
let next = document.querySelector('.banner-next')
let prev = document.querySelector('.banner-prev')
let imgWrap = document.querySelector('.banner__img')

let currentIndex = 0

setCurrent(currentIndex)

function setCurrent(index) {
	currentIndex = index
	imgWrap.src = listDivImg[index].querySelector('img').src

	listDivImg.forEach((item) => {
		item.classList.remove('active')
	})

	listDivImg[index].classList.add('active')
}

listDivImg.forEach((img, index) => {
	img.addEventListener('click', (e) => {
		setCurrent(index)
	})
})

next.addEventListener('click', () => {
	if (currentIndex == listDivImg.length - 1) {
		currentIndex = 0
	} else currentIndex++

	setCurrent(currentIndex)
})

prev.addEventListener('click', () => {
	if (currentIndex == 0) currentIndex = listDivImg.length - 1
	else currentIndex--

	setCurrent(currentIndex)
})
