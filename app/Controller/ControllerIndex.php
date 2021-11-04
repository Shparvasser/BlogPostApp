<?

namespace App\Controller;

use App\Model\ModelUsers;
use App\Model\User;

class ControllerIndex extends ControllerBase
{

	public $layouts = "first_layouts";

	function index()
	{
		$model = new ModelUsers();
		$userInfo = $model->getUser();
		$this->template->vars('userInfo', $userInfo);
		$this->template->view('index');
	}
}
