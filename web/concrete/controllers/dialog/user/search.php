<?
namespace \Concrete\Controller\Dialog\User;
use \Concrete\Controller\Backend\UI as BackendInterfaceController;
class Search extends BackendInterfaceController {

	protected $viewPath = '/system/dialogs/user/search';

	protected function canAccess() {
		$tp = Loader::helper('concrete/user');
		return $tp->canAccessUserSearchInterface();
	}

	public function view() {
		$cnt = new \Concrete\Controller\Search\Users();
		$cnt->search();
		$result = Loader::helper('json')->encode($cnt->getSearchResultObject()->getJSONObject());
		$this->set('result', $result);
		$this->set('searchController', $cnt);
	}

}
