<?php
/** no direct access **/
defined('_WPLEXEC') or die('Restricted access');
_wpl_import('libraries.locations');

class wpl_profile_listing_controller extends wpl_controller
{
	public function display()
	{
		$function = wpl_request::getVar('wpl_function');
        
        if($function == 'contact_profile') $this->contact_profile();
	}
    
    private function contact_profile()
    {
        $fullname = wpl_request::getVar('fullname', '');
        $phone = wpl_request::getVar('phone', '');
        $email = wpl_request::getVar('email', '');
        $message = wpl_request::getVar('message', '');
        $user_id = wpl_request::getVar('user_id', '');
        
        $parameters = array(
            'fullname' => $fullname,
            'phone' => $phone,
            'email' => $email,
            'message' => $message,
            'user_id' => $user_id
        );
        
        // For integrating third party plugins such as captcha plugins
        apply_filters('preprocess_comment', array());
        
        $returnData = array();
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $returnData['success'] = 0;
            $returnData['message'] = __('Your email is not a valid email!', 'wpl');
        }
        elseif(!wpl_security::verify_nonce(wpl_request::getVar('_wpnonce', ''), 'wpl_user_contact_form'))
        {
            $returnData['success'] = 0;
            $returnData['message'] = __('The security nonce is not valid!', 'wpl');
        }
        else
        {
            wpl_events::trigger('contact_profile', $parameters);
            
            $returnData['success'] = 1;
            $returnData['message'] = __('Information sent to agent.', 'wpl');
        }
        
        echo json_encode($returnData);
        exit;
    }
}