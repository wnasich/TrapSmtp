<?php
App::uses('SmtpTransport', 'Network/Email');

class TrapSmtpTransport extends SmtpTransport {

	/**
	 * Override SmtpTransport method to backup original recipients into header
	 *  and replace them by address spec in $config['realRecipients']
	 *
	 * @param string|array $content String with message or array with messages
	 * @return array
	 * @throws InvalidArgumentException
	 */
	public function send(CakeEmail $email) {
		if (empty($this->_config['realRecipients']) {
			throw new InvalidArgumentException(__('Must set a real recipients'));
		} else {
			$originalTo = $email->to();
			$originalCC = $email->cc();
			$originalBCC = $email->bcc();
			$email->to($this->_config['realRecipients']);
			if ($originalTo) {
				$email->addHeaders(array('X-intended-to' => join(', ', $originalTo)));
			}
			if ($originalCC) {
				$email->addHeaders(array('X-intended-cc' => join(', ', $originalCC)));
				$email->cc(array());
			}
			if ($originalBCC) {
				$email->addHeaders(array('X-intended-bcc' => join(', ', $originalBCC)));
				$email->bcc(array());
			}
		}

		return parent::send($email);
	}
}
