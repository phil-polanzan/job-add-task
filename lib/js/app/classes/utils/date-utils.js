export class DateUtils {
	static getFromString(string)
	{
		// front end date form is dd.mm.yyyy
		return new Date(string.replace(/(\d{2})\.(\d{2})\.(\d{4})/, '$3-$2-$1'));
	}

	static getFrontEndFormat()
	{
		return 'dd.mm.yy';
	}

	static getDateString(date)
	{
		return [
			date.toLocaleString('default', { year: 'numeric' }),
			date.toLocaleString('default', { month: '2-digit' }),
			date.toLocaleString('default', { day: '2-digit' })
		].join('-')
	}
}
