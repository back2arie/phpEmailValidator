<?php
namespace phpEmailValidator;
use EmailValidator\EmailValidator as EmailValidator;
use Phpjsondns\Phpjsondns as Phpjsondns;
use Egulias\EmailValidator\EmailParser as EmailParser;
use Egulias\EmailValidator\EmailLexer as EmailLexer;
require('vendor/autoload.php');

class phpEmailValidator
{
    /**
    * Error string
    * @var string
    */
    private $error = '';

    /* Class constructor
     *
     * @return void
     */
    public function __construct()
    {
        $this->Phpjsondns = new Phpjsondns();
        $this->parser = new EmailParser(new EmailLexer());
    }

    /* Validate email address
     *
     * @param string $email
     * @return boolean
     */
    public function validate($email = '')
    {
        // Step 1: Syntax check
        if(!EmailValidator::validate($email))
        {
            $this->setError('Syntax check error');
            return FALSE;
        }

        // Step 2: Domain check
        $this->parser->parse((string)$email);
        $strDomain = $this->parser->getParsedDomainPart();
        $arrDomain = $this->Phpjsondns->get($strDomain, 'mx', 'array');

        if(isset($arrDomain['error']))
        {
            $this->setError('Cannot find MX record for domain '.$strDomain);
            return FALSE;
        }
        // Step 3: SMTP check
        if(!EmailValidator::exists($email))
        {
            $this->setError('Cannot find SMTP account for '.$email);
            return FALSE;
        }

        return TRUE;
    }

    /* Set error
     *
     * @param string $message
     * @return void
     */
    private function setError($message = '')
    {
        $this->error = $message;
    }

    /* Get error
     *
     * @return string
     */
    public function getError()
    {
        return $this->error;
    }

}
