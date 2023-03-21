import {AjaxResponse} from "../responses/ajax-response";
import {AjaxForm} from "./ajax-form";

export class AjaxPostForm extends AjaxForm
{
	done(response)
	{
		if (response.status == AjaxResponse.getOkMessage()) {
			this.showAlertMessage('.alert-success', response.message);
			this.el.hide();
		} else {
			this.showAlertMessage('.alert-danger', response.message);
		}
	}
}

