export class DateUtils {
	static getFromString(string) {
		// front end date form is dd.mm.yyyy
		let pattern = /(\d{2})\.(\d{2})\.(\d{4})/;
		return new Date(string.replace(pattern, '$3-$2-$1'));
	}
}
