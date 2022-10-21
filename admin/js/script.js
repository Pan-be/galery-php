$(document).ready(function () {
	let userHref
	let userHrefSplitted
	let userId

	let imageSrc
	let imageSrcSplitted
	let imageName

	$(".modal_thumbnails").click(function () {
		$("#set_user_image").prop("disabled", false)

		$(this).addClass("selected")
		userHref = $("#user-id").prop("href")
		userHrefSplitted = userHref.split("=")
		userId = userHrefSplitted[userHrefSplitted.length - 1]

		imageSrc = $(this).prop("src")
		imageSrcSplitted = imageSrc.split("/")
		imageName = imageSrcSplitted[imageSrcSplitted.length - 1]
	})

	$("#set_user_image").click(function () {
		$.ajax({
			url: "includes/ajax_code.php",
			data: { imageName: imageName, userId: userId },
			type: "POST",
			success: function (data) {
				if (!data.error) {
					$(".user_image_box a img").prop("src", data)
				}
			},
		})
	})
})
