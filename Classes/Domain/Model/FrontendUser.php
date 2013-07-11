<?php
namespace Evoweb\SfRegister\Domain\Model;
/***************************************************************
 * Copyright notice
 *
 * (c) 2011-13 Sebastian Fischer <typo3@evoweb.de>
 * All rights reserved
 *
 * This script is part of the TYPO3 project. The TYPO3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * An extended frontend user with more attributes
 */
class FrontendUser extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser implements \Evoweb\SfRegister\Interfaces\FrontendUser {
	/**
	 * If the account is diabled or not
	 *
	 * @var boolean
	 */
	protected $disable;

	/**
	 * Mailhash for activation by email
	 *
	 * @var string
	 */
	protected $mailhash;

	/**
	 * Date on which the account was activated
	 *
	 * @var \DateTime
	 */
	protected $activatedOn;

	/**
	 *  virtual not stored in database
	 *
	 * @var string
	 */
	protected $captcha;

	/**
	 *  virtual not stored in database
	 *
	 * @var string
	 */
	protected $passwordRepeat;

	/**
	 *  virtual not stored in database
	 *
	 * @var string
	 */
	protected $emailRepeat;

	/**
	 * Pseudonym
	 *
	 * @var string
	 */
	protected $pseudonym;

	/**
	 * Gender 1 or 2 for mr or mrs
	 *
	 * @var integer
	 */
	protected $gender;

	/**
	 * Date of birth
	 *
	 * @var \DateTime
	 */
	protected $dateOfBirth;

	/**
	 * Day of date of birth
	 *
	 * @var integer
	 */
	protected $dateOfBirthDay;

	/**
	 * Month of date of birth
	 *
	 * @var integer
	 */
	protected $dateOfBirthMonth;

	/**
	 * Year of date of birth
	 *
	 * @var integer
	 */
	protected $dateOfBirthYear;

	/**
	 * Language
	 *
	 * @var string
	 */
	protected $language;

	/**
	 * Code of state/province
	 *
	 * @var string
	 */
	protected $zone;

	/**
	 * Timezone
	 *
	 * @var float
	 */
	protected $timezone;

	/**
	 * Daylight saving time
	 *
	 * @var boolean
	 */
	protected $daylight;

	/**
	 * Country with static info table code
	 *
	 * @var string
	 */
	protected $staticInfoCountry;

	/**
	 * Number of mobilephone
	 *
	 * @var string
	 */
	protected $mobilephone;

	/**
	 * General terms and conditions accepted flag
	 *
	 * @var boolean
	 */
	protected $gtc;

	/**
	 * Privacy agreement accepted flag
	 *
	 * @var boolean
	 */
	protected $privacy;

	/**
	 * Status
	 *
	 * @var integer
	 */
	protected $status;

	/**
	 * wether the user register by invitation
	 *
	 * @var boolean
	 */
	protected $byInvitation;

	/**
	 * comment of user
	 *
	 * @var string
	 */
	protected $comments;

	/**
	 * if emails should be send as HTML or plain text
	 *
	 * @var boolean
	 */
	protected $moduleSysDmailHtml;

	/**
	 * selected dmail categories
	 *
	 * @var array
	 */
	protected $moduleSysDmailCategory;

	/**
	 * new email address before edit
	 *
	 * @var string
	 */
	protected $emailNew;


	/**
	 * @var string
	 */
	protected $custom0 = '';

	/**
	 * @var string
	 */
	protected $custom1 = '';

	/**
	 * @var string
	 */
	protected $custom2 = '';

	/**
	 * @var string
	 */
	protected $custom3 = '';

	/**
	 * @var string
	 */
	protected $custom4 = '';

	/**
	 * @var string
	 */
	protected $custom5 = '';

	/**
	 * @var string
	 */
	protected $custom6 = '';

	/**
	 * @var string
	 */
	protected $custom7 = '';

	/**
	 * @var string
	 */
	protected $custom8 = '';

	/**
	 * @var string
	 */
	protected $custom9 = '';


	/**
	 * Constructs a new Front-End User
	 *
	 * @param string $username
	 * @param string $password
	 */
	public function __construct($username = '', $password = '') {
		parent::__construct($username, $password);

		$this->activatedOn = new \DateTime();
		$this->dateOfBirth = new \DateTime();
	}

	/**
	 * Initializes the date of birth if related values are set by request to argument mapping
	 *
	 * @return void
	 */
	public function prepareDateOfBirth() {
		if ($this->dateOfBirthDay) {
			$this->setDateOfBirthDay($this->dateOfBirthDay);
		}
		if ($this->dateOfBirthMonth) {
			$this->setDateOfBirthMonth($this->dateOfBirthMonth);
		}
		if ($this->dateOfBirthYear) {
			$this->setDateOfBirthYear($this->dateOfBirthYear);
		}
	}

	/**
	 * Getter for disable
	 *
	 * @return boolean
	 */
	public function getDisable() {
		return ($this->disable ? TRUE : FALSE);
	}

	/**
	 * Setter for disable
	 *
	 * @param boolean $disable
	 * @return void
	 */
	public function setDisable($disable) {
		$this->disable = ($disable ? TRUE : FALSE);
	}

	/**
	 * Getter for mailhash
	 *
	 * @return string
	 */
	public function getMailhash() {
		return $this->mailhash;
	}

	/**
	 * Setter for mailhash
	 *
	 * @param string $mailhash
	 * @return void
	 */
	public function setMailhash($mailhash) {
		$this->mailhash = trim($mailhash);
	}

	/**
	 * @return \DateTime
	 */
	public function getActivatedOn() {
		return $this->activatedOn;
	}

	/**
	 * @param \DateTime $activatedOn
	 * @return void
	 */
	public function setActivatedOn($activatedOn) {
		$this->activatedOn = $activatedOn;
	}

	/**
	 * Getter for captcha
	 *
	 * @return string
	 */
	public function getCaptcha() {
		return $this->captcha;
	}

	/**
	 * Setter for captcha
	 *
	 * @param string $captcha
	 * @return void
	 */
	public function setCaptcha($captcha) {
		$this->captcha = trim($captcha);
	}

	/**
	 * Getter for passwordRepeat
	 *
	 * @return string
	 */
	public function getPasswordRepeat() {
		return $this->passwordRepeat;
	}

	/**
	 * Setter for passwordRepeat
	 *
	 * @param string $passwordRepeat
	 * @return void
	 */
	public function setPasswordRepeat($passwordRepeat) {
		$this->passwordRepeat = trim($passwordRepeat);
	}

	/**
	 * Getter for emailRepeat
	 *
	 * @return string
	 */
	public function getEmailRepeat() {
		return $this->emailRepeat;
	}

	/**
	 * Setter for emailRepeat
	 *
	 * @param string $emailRepeat
	 * @return void
	 */
	public function setEmailRepeat($emailRepeat) {
		$this->emailRepeat = trim($emailRepeat);
	}

	/**
	 * Add an image to the imagelist
	 *
	 * @param string $image
	 * @return void
	 */
	public function addImage($image) {
		$imageList = $this->getImageList();

		if (!in_array($image, $imageList)) {
			$imageList = array_merge($imageList, array($image));
		}

		$this->setImageList($imageList);
	}

	/**
	 * Remove an image from the imagelist
	 *
	 * @param string $image
	 * @return void
	 */
	public function removeImage($image) {
		$imageList = $this->getImageList();

		if (in_array($image, $imageList)) {
			$imageList = array_diff($imageList, array($image));
		}

		$this->setImageList($imageList);
	}

	/**
	 * Get an image list
	 *
	 * @return array
	 */
	public function getImageList() {
		return \TYPO3\CMS\Core\Utility\GeneralUtility::trimExplode(',', $this->image, TRUE);
	}

	/**
	 * Set an image list
	 *
	 * @param array $imageList
	 * @return void
	 */
	public function setImageList($imageList) {
		$this->image = implode(',', $imageList);
	}

	/**
	 * Setter for title
	 *
	 * @param string $title
	 * @return void
	 */
	public function setTitle($title) {
		if ($title == 'none') {
			$title = '';
		}
		$this->title = $title;
	}

	/**
	 * Getter for pseudonym
	 *
	 * @return string
	 */
	public function getPseudonym() {
		return $this->pseudonym;
	}

	/**
	 * Setter for pseudonym
	 *
	 * @param string $pseudonym
	 * @return void
	 */
	public function setPseudonym($pseudonym) {
		$this->pseudonym = $pseudonym;
	}

	/**
	 * Getter for gender
	 *
	 * @return integer
	 */
	public function getGender() {
		return $this->gender;
	}

	/**
	 * Setter for gender
	 *
	 * @param integer $gender
	 * @return void
	 */
	public function setGender($gender) {
		$this->gender = $gender;
	}

	/**
	 * Getter for dateOfBirth
	 *
	 * @return \DateTime
	 */
	public function getDateOfBirth() {
		return $this->dateOfBirth;
	}

	/**
	 * Setter for dateOfBirth
	 *
	 * @param string $dateOfBirth
	 * @return void
	 */
	public function setDateOfBirth($dateOfBirth) {
		$this->dateOfBirth = $dateOfBirth;
	}

	/**
	 * Getter for day of dateOfBirth
	 *
	 * @return integer
	 */
	public function getDateOfBirthDay() {
		$result = 0;

		if ($this->dateOfBirth instanceof \DateTime) {
			$result = $this->dateOfBirth->format('j');
		}

		return $result;
	}

	/**
	 * Setter for day of dateOfBirth
	 *
	 * @param integer $day
	 * @return void
	 */
	public function setDateOfBirthDay($day) {
		$this->dateOfBirthDay = $day;
		$this->dateOfBirth->setDate($this->dateOfBirth->format('Y'), $this->dateOfBirth->format('m'), $day);
	}

	/**
	 * Getter for month of dateOfBirth
	 *
	 * @return integer
	 */
	public function getDateOfBirthMonth() {
		$result = 0;

		if ($this->dateOfBirth instanceof \DateTime) {
			$result = $this->dateOfBirth->format('n');
		}

		return $result;
	}

	/**
	 * Setter for month of dateOfBirth
	 *
	 * @param integer $month
	 * @return void
	 */
	public function setDateOfBirthMonth($month) {
		$this->dateOfBirthMonth = $month;
		$this->dateOfBirth->setDate($this->dateOfBirth->format('Y'), $month, $this->dateOfBirth->format('d'));
	}

	/**
	 * Getter for year of dateOfBirth
	 *
	 * @return integer
	 */
	public function getDateOfBirthYear() {
		$result = 0;

		if ($this->dateOfBirth instanceof \DateTime) {
			$result = $this->dateOfBirth->format('Y');
		}

		return $result;
	}

	/**
	 * Setter for month of dateOfBirth
	 *
	 * @param integer $year
	 * @return void
	 */
	public function setDateOfBirthYear($year) {
		$this->dateOfBirthYear = $year;
		$this->dateOfBirth->setDate($year, $this->dateOfBirth->format('m'), $this->dateOfBirth->format('d'));
	}

	/**
	 * Getter for mobilphone
	 *
	 * @return string
	 */
	public function getMobilephone() {
		return $this->mobilephone;
	}

	/**
	 * Setter for mobilphone
	 *
	 * @param string $mobilephone
	 * @return void
	 */
	public function setMobilephone($mobilephone) {
		$this->mobilephone = $mobilephone;
	}

	/**
	 * Getter for zone
	 *
	 * @return string
	 */
	public function getZone() {
		return $this->zone;
	}

	/**
	 * Setter for zone
	 *
	 * @param string $zone
	 * @return void
	 */
	public function setZone($zone) {
		$this->zone = $zone;
	}

	/**
	 * @return float
	 */
	public function getTimezone() {
		return floor($this->timezone) != $this->timezone ?
			$this->timezone * 10 :
			$this->timezone;
	}

	/**
	 * @param float $timezone
	 * @return void
	 */
	public function setTimezone($timezone) {
		$this->timezone = ($timezone > 14 || $timezone < -12 ?
			$timezone / 10 :
			$timezone);
	}

	/**
	 * @return boolean
	 */
	public function getDaylight() {
		return $this->daylight ?
			TRUE :
			FALSE;
	}

	/**
	 * @param boolean $daylight
	 * @return void
	 */
	public function setDaylight($daylight) {
		$this->daylight = ($daylight ?
			TRUE :
			FALSE);
	}

	/**
	 * Getter for static info cpuntry
	 *
	 * @return string
	 */
	public function getStaticInfoCountry() {
		return $this->staticInfoCountry;
	}

	/**
	 * Setter got static info country
	 *
	 * @param string $staticInfoCountry
	 * @return void
	 */
	public function setStaticInfoCountry($staticInfoCountry) {
		$this->staticInfoCountry = $staticInfoCountry;
	}

	/**
	 * Getter for gtc
	 *
	 * @return boolean
	 */
	public function getGtc() {
		return $this->gtc ? TRUE : FALSE;
	}

	/**
	 * Setter for gtc
	 *
	 * @param boolean $gtc
	 * @return void
	 */
	public function setGtc($gtc) {
		$this->gtc = ($gtc ? TRUE : FALSE);
	}

	/**
	 * Getter for privacy agreement flag
	 *
	 * @return boolean
	 */
	public function getPrivacy() {
		return $this->privacy ? TRUE : FALSE;
	}

	/**
	 * Setter for privacy agreement flag
	 *
	 * @param boolean $privacy
	 * @return void
	 */
	public function setPrivacy($privacy) {
		$this->privacy = ($privacy ? TRUE : FALSE);
	}

	/**
	 * @param boolean $byInvitation
	 */
	public function setByInvitation($byInvitation) {
		$this->byInvitation = $byInvitation;
	}

	/**
	 * @return boolean
	 */
	public function getByInvitation() {
		return $this->byInvitation;
	}

	/**
	 * @param string $comments
	 */
	public function setComments($comments) {
		$this->comments = $comments;
	}

	/**
	 * @return string
	 */
	public function getComments() {
		return $this->comments;
	}

	/**
	 * @param string $language
	 */
	public function setLanguage($language) {
		$this->language = $language;
	}

	/**
	 * @return string
	 */
	public function getLanguage() {
		return $this->language;
	}

	/**
	 * @param array $moduleSysDmailCategory
	 */
	public function setModuleSysDmailCategory($moduleSysDmailCategory) {
		$this->moduleSysDmailCategory = $moduleSysDmailCategory;
	}

	/**
	 * @return array
	 */
	public function getModuleSysDmailCategory() {
		return $this->moduleSysDmailCategory;
	}

	/**
	 * @param boolean $moduleSysDmailHtml
	 */
	public function setModuleSysDmailHtml($moduleSysDmailHtml) {
		$this->moduleSysDmailHtml = $moduleSysDmailHtml;
	}

	/**
	 * @return boolean
	 */
	public function getModuleSysDmailHtml() {
		return $this->moduleSysDmailHtml;
	}

	/**
	 * @param int $status
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

	/**
	 * @return int
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @param string $emailNew
	 */
	public function setEmailNew($emailNew) {
		$this->emailNew = $emailNew;
	}

	/**
	 * @return string
	 */
	public function getEmailNew() {
		return $this->emailNew;
	}


	/**
	 * @param string $custom0
	 */
	public function setCustom0($custom0) {
		$this->custom0 = $custom0;
	}

	/**
	 * @return string
	 */
	public function getCustom0() {
		return $this->custom0;
	}

	/**
	 * @param string $custom1
	 */
	public function setCustom1($custom1) {
		$this->custom1 = $custom1;
	}

	/**
	 * @return string
	 */
	public function getCustom1() {
		return $this->custom1;
	}

	/**
	 * @param string $custom2
	 */
	public function setCustom2($custom2) {
		$this->custom2 = $custom2;
	}

	/**
	 * @return string
	 */
	public function getCustom2() {
		return $this->custom2;
	}

	/**
	 * @param string $custom3
	 */
	public function setCustom3($custom3) {
		$this->custom3 = $custom3;
	}

	/**
	 * @return string
	 */
	public function getCustom3() {
		return $this->custom3;
	}

	/**
	 * @param string $custom4
	 */
	public function setCustom4($custom4) {
		$this->custom4 = $custom4;
	}

	/**
	 * @return string
	 */
	public function getCustom4() {
		return $this->custom4;
	}

	/**
	 * @param string $custom5
	 */
	public function setCustom5($custom5) {
		$this->custom5 = $custom5;
	}

	/**
	 * @return string
	 */
	public function getCustom5() {
		return $this->custom5;
	}

	/**
	 * @param string $custom6
	 */
	public function setCustom6($custom6) {
		$this->custom6 = $custom6;
	}

	/**
	 * @return string
	 */
	public function getCustom6() {
		return $this->custom6;
	}

	/**
	 * @param string $custom7
	 */
	public function setCustom7($custom7) {
		$this->custom7 = $custom7;
	}

	/**
	 * @return string
	 */
	public function getCustom7() {
		return $this->custom7;
	}

	/**
	 * @param string $custom8
	 */
	public function setCustom8($custom8) {
		$this->custom8 = $custom8;
	}

	/**
	 * @return string
	 */
	public function getCustom8() {
		return $this->custom8;
	}

	/**
	 * @param string $custom9
	 */
	public function setCustom9($custom9) {
		$this->custom9 = $custom9;
	}

	/**
	 * @return string
	 */
	public function getCustom9() {
		return $this->custom9;
	}
}

?>