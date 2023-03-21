export class AppSummernote
{
	static init(el)
	{
		$(el).summernote({
			height: 150,
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'italic', 'underline', 'clear']],
				['color', ['color']],
				['para', ['ul', 'ol']]
			]
		});
	}
}