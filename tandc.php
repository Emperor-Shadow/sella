<?php
    require_once("php_files/connection.php");
    require_once("php_files/functions.php");


   $user_id = $_SESSION['id'];
    $fname = $_SESSION['fname'];
    $lname = $_SESSION['lname'];
    $email = $_SESSION['email'];
    $user_type = $_SESSION['user_type'];
    require_once("php_files/logged_in.php");
  //   header('URL : login.php');
        if (!$user_id > 0) {
        session_destroy();
        header("location: login.php");
    }


    // $fname = $_SESSION['fname'];
    // $lname = $_SESSION['lname'];
    // $email = $_SESSION['email'];
    // $user_type = $_SESSION['user_type'];

    $first_initial_array = str_split($fname);
    $first_initial = $first_initial_array[0];
// five($connection);

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sella | Ecommerce bootstrap template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- gLightbox gallery-->
    <link rel="stylesheet" href="vendor/glightbox/css/glightbox.min.css">
    <!-- Range slider-->
    <link rel="stylesheet" href="vendor/nouislider/nouislider.min.css">
    <!-- Choices CSS-->
    <link rel="stylesheet" href="vendor/choices.js/public/assets/styles/choices.min.css">
    <!-- Swiper slider-->
    <link rel="stylesheet" href="vendor/swiper/swiper-bundle.min.css">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" >
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="icons/all.css">
    <link rel="stylesheet" href="fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="admin/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="admin/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/AdminLTE-3.2.0/dist/css/adminlte.min.css">
		<link rel="stylesheet" href="AOS - Animate on scroll library_files/aos.css">
    
  </head>
  <body>
    <div class="page-holder">
      <!-- navbar-->
      <?php require_once('nav.php'); ?>

      <div class="row">
        <div class="col-md-6">
          <h3 class="text-center">Sella Main Page</h3>
          <h4 class="text-center">Sella Business Terms of Service</h4>
          <h4 class="text-center">Effective Date: April 27, 2023</h4>
      <ul>
        <li>
          <h6>1. Introduction</h6>
          <p>
            You and the company or business that you are authorized to represent (“you,” “your,” or “Company”) agree to these Sella Business Terms of Service and all other applicable terms, policies, and documentation (collectively, “Business Terms”) by downloading or using Sella’s apps, software, features, services, and APIs designed and developed for businesses (“Business Services”).

            Sella LLC is the contracting entity providing you our Business Services, unless you are in a country in the European Economic Area and any other included country or territory (“European Region”), in which case Sella Ireland Limited is the contracting entity providing you our Business Services (each contracting entity individually, “Sella,” “our,” “we,” or “us”). We provide our Business Services solely for your business or commercial use. <br>

            <b>NO ACCESS TO EMERGENCY SERVICES. Please note important differences between our Business Services and mobile phone, fixed-line telephone, or SMS services. Our Business Services do not provide access to emergency services or emergency services providers, including the police, fire departments, or hospitals, or otherwise connect to public safety answering points. Company should ensure that it can contact its relevant emergency services providers through a mobile phone, fixed-line telephone, or other service.</b>
          </p>
        </li>

        <li>
          <h6>2. Additional Terms and Policies</h6>
          <p>These Business Terms incorporate by reference the following policies and documents:
              Sella Business Policy
              Sella Business Data Processing Terms
              Sella Intellectual Property Policy
              Sella Brand Guidelines
              To the extent that any of the additional terms and policies conflict with these Business Terms, the additional terms and policies will govern.</p>
        </li>
        <li>
          <h6>3. Sella Business Account</h6>
            <p>Business Use and Eligibility. You represent and warrant that you: (a) will use our Business Services solely for business, commercial, and authorized purposes, and not for personal use; (b) will only provide registration information associated with your Company; (c) are authorized to enter into these Business Terms and are at least 18 years old (or the age of majority in your country of residence); and (d) have not been previously suspended or removed from our Business Services, or engaged in any activity that could result in suspension or removal.

            Registration and Account. Company must create a Sella business account by providing accurate, current, and complete information, including its valid legal business phone number, Company name, and other information we require. Company will keep its business account information updated. Company’s name must not: (a) be false, misleading, deceptive, or defamatory; (b) parody a third party or include character symbols, excessive punctuation, or trademark designations; or (c) infringe any trademark, violate any right of publicity, or otherwise violate anyone’s rights. We reserve the right to reclaim account names on behalf of any business or individual that holds legal claim in those names.

            Communication Preferences. As part of your relationship with us, you permit Sella and third party providers to use your contact information to send you electronic communications (such as messages, emails, and phone calls via Sella or otherwise) from us or our third-party providers, including: (a) notices about your account, password changes, payment authorizations, and other transactional information; (b) notices about updates to our Business Terms; and (c) information about products, services, surveys, events, news, and promotions offered by Sella or the other Meta Companies where permitted by applicable law. If you do not wish for Sella to communicate with you regarding (c) above, you may opt-out of future communications by writing to Sella as specified in the Notices section below, or by clicking the “unsubscribe” link in any such communication.

            Devices and Software. You must provide certain devices, software, and data connections, which we do not otherwise supply, to use our Business Services. You agree to manually or automatically download and install updates to our Business Services.

            Fees and Taxes. You are responsible for all carrier data plans, Internet fees, and other fees and taxes associated with your use of our Business Services.

            Linking to Facebook. To use all or certain features of our Business Services, we may require Company to link its Sella business account with the Facebook account used for its business. Facebook’s terms and policies apply to the extent that you use Facebook’s services.

            Third-Party Services. Our Business Services may allow Company to access, use, or interact with websites, apps, content, and other products and services that are not provided by Sella. For example, Company may choose to use third-party data backup services (such as iCloud or Google Drive) that may be used with some of our Business Services. Please note that when Company uses these other services, their own terms and privacy policies will govern Company’s use of those services. Sella will not be responsible or liable for your use of those services, the third-party’s terms, or any actions you take under the third-party’s terms.</p>
        </li>
        <li>
          <h6>4. Company’s Legal, Privacy, and Security Responsibilities</h6>
          <p>Compliance with Laws and Regulations. You may only use our Business Services if you have ensured that your use of our Business Services complies with all legal and regulatory requirements applicable to Company; it is your sole responsibility to determine your legal obligations. Our Business Services are not intended for intra-company usage. We make no representations or warranties that our Business Services meet the needs of entities regulated by laws and regulations with heightened confidentiality requirements for personal data, such as healthcare, financial, or legal services entities. Company must provide all necessary data disclosures and notices (such as maintaining a privacy policy or labelling marketing messages). Company must also secure all necessary rights, consents, and permissions (for example, opt-in) to share its customers’ contact and other personal data with Sella, and to communicate with its customers via the Sella service using this information. Sella is not liable for any acts or omissions by Company that breach any applicable laws. Company must also honor and comply with all Sella user requests to stop or opt-out of receiving certain or all types of Sella messages from Company. Sella users may block Company, mark Company’s messages as spam, or report Company’s actions or messages to us to notify us that Company is violating our terms and policies. Sella will then take appropriate action, which could result in Sella suspending or terminating Company’s use of our Business Services.

          Security Responsibilities. Company may only allow authorized individuals acting on behalf of Company to access and use its Sella business account for purposes authorized under these Business Terms. Company is responsible for all activities occurring under its account. Company must: (a) maintain the security of its account credentials; (b) keep its devices and Sella account safe and secure; (c) prevent unauthorized use of or access to our Business Services; and (d) immediately notify us if Company discovers or suspects any security breaches related to our Business Services or if Company discovers or suspects any such unauthorized access or use. Company will implement and follow generally recognized industry standards and best practices for data and information security to protect Company’s data, network, and systems from unauthorized access, use, or copying. Company must promptly delete any user’s information it obtained via our Business Services if we determine, in our reasonable discretion, that Company breached its obligation to protect and prevent unauthorized use or access to its devices, account, or systems, or otherwise breached these Business Terms.</p>
        </li>
        <li>
          <h6>5. Licenses and Intellectual Property</h6>
          <p>Company License to Us. Our Business Services enable you to create, post, store, send, and receive content, such as text, images, videos, and other materials, including Company’s trademarks, logos, slogans, and other proprietary materials (collectively, “Company Content”). For example, you may post Company’s logo, or images and descriptions of Company’s goods and services, to Company’s business profile. You grant Sella, and its subsidiaries and affiliates, a worldwide, non-exclusive, sub-licensable, and transferable license to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, and publicly perform or display Company Content that you upload, submit, store, send, or receive on or through our Business Services, solely for the purposes of providing, operating, developing, promoting, updating, and improving our Business Services, and researching and developing new services, features, or uses. You represent and warrant that you have all rights necessary to grant us the license to Company Content, and that our use of it, as permitted by these Business Terms, will not violate any right of, or cause injury to, any person or entity.

          Company’s Rights. Except for the license you grant to us above, you retain all ownership and other rights in and to your Company Content.

          Our License to Company. Subject to your compliance with these Business Terms, we grant you a limited, revocable, non-exclusive, non-sublicensable, and non-transferable license to use our Business Services solely as authorized in these Business Terms. You can only use our trademarks as expressly permitted by our Sella Brand Guidelines or with our prior written permission.

          Sella’s Rights. Except for the express license granted in these Business Terms, we grant no other licenses or rights to Company by implication or otherwise. Unless otherwise indicated, we own all copyrights, trademarks, domains, logos, trade dress, trade secrets, patents, and other intellectual property rights associated with our Business Services.

          Restrictions. Except as otherwise permitted by Sella in writing, Company must not directly, indirectly, or through automated or other means: (a) distribute, sell, resell, or rent our Business Services to third parties; (b) distribute or make our Business Services available over a network to be used by multiple devices at the same time, except as authorized through tools and configurations that we have expressly provided for your use via our Business Services; and (c) copy, reproduce, distribute, publicly perform or display, modify, or make derivative works based upon all or portions of our Business Services. Company must not directly, indirectly, or through automated or other means: (d) remove any proprietary rights notices or markings; (e) reverse engineer any aspect of our Business Services or do anything that may discover source code; (f) scrape or extract data from our Business Services; (g) develop or use any applications that interact with our Business Services without our prior written consent; and (h) create software or APIs that function substantially the same as our Business Services and offer them for use by third parties in an unauthorized manner on or utilizing the Sella platform or our Business Services.

          Reporting Third-Party Copyright, Trademark, and Other Intellectual Property Infringement. To report claims of third-party copyright, trademark, or other intellectual property infringement, please visit our Sella Intellectual Property Policy. If you infringe the intellectual property rights of others, we may take action with respect to your account, including disabling or suspending your account.

          Feedback. We always appreciate your feedback or other suggestions about Sella. You agree that any questions, comments, suggestions, ideas, original or creative materials, or other information about Sella or our products or services that you post, submit, or otherwise communicate to us (collectively, “Feedback”) is non-confidential and that we will be entitled to the unrestricted use and dissemination of Feedback for any purpose, commercial or otherwise, without acknowledgment or compensation to you.</p>
        </li>
        <li>
          <h6>6. Acceptable Use of our Business Services</h6>
          <p>Acceptable Use. Company will not (nor assist others to) violate any applicable law, contract, intellectual property, or other third-party right, and Company is solely responsible for its conduct while using our Business Services. Company must not directly, indirectly, or through automated or other means: (a) use our Business Services for personal, family, or household purposes; (b) instigate, engage in, or encourage any harassing, threatening, intimidating, predatory, or stalking conduct, or any other conduct that would be illegal or otherwise inappropriate, such as promoting violent crimes, endangering or exploiting children or others, or coordinating harm; (c) use or attempt to use another user’s account without prior authorization from that user and Sella; (d) impersonate or register on behalf of any person or entity or otherwise misrepresent your affiliation with a person or entity, perpetrate fraud, or publish falsehoods or misleading statements; (e) collect information of or about other users in any impermissible or unauthorized manner; (f) use our Business Services other than for their intended purpose or interfere with, disrupt, negatively affect, or inhibit other users; (g) damage, disable, overburden, or impair our Business Services; (h) send, distribute, or post spam, unsolicited electronic communications, chain letters, pyramid schemes, or illegal or impermissible communications; (i) post, upload, or share any content which is unlawful, libelous, defamatory, obscene, pornographic, indecent, lewd, suggestive, harassing, hateful, ethnically or racially offensive, threatening, invasive of privacy or publicity rights, abusive, inflammatory, fraudulent, or is in our sole judgment objectionable; (j) encourage or provide instructions for a criminal offense; (k) distribute any viruses, corrupted data, or other harmful, disruptive, or destructive files or content; (l) bypass, ignore, or circumvent instructions in our robots.txt file or any measures we employ to prevent or limit access to any part of our Business Services, including content-filtering techniques; or (m) expose Sella or others to any type of harm or liability.

          Enforcement. Although we have no obligation to screen or monitor Company Content (such as content you post to your business profile), we may, subject to applicable law, review, remove, or delete Company Content you share when it violates these Business Terms or our policies and we become aware of it. We also need and do use information reported to us by other Sella users (such as when they block you or disclose your messages to us as part of a complaint) to determine whether you have breached these Business Terms or are not complying with our policies. If we determine that you have breached these Business Terms or are not complying with our policies, we have the right to limit, throttle, suspend, or terminate Company’s account, depending on the type and circumstances of the breach and within our reasonable discretion. In the event that we terminate Company’s account, Company will not create another Sella business account without our express written permission.

          Complaints. You can submit a complaint to us at businesscomplaints@support.Sella.com regarding the following:
          technical or technological issues,
          customer service issues,
          suspension and termination of your account or Services, or
          any alleged breach by us of these Terms or the EU Regulation 2019/1150 (the “Platform Regulation”).
          We will acknowledge all complaints and follow-up with you to address your complaint within a reasonable timeframe. We will communicate the outcome of our complaint investigation to you if you have provided us with your valid email address.</p>
        </li>
      </ul>

    

        </div>
        <div class="col-md-6">
        <ul>
        <li>
          <h6>7. Our Data Practices</h6>
          <p>Your Customer Contacts. Company provides customer contact information such as phone numbers (“Customer Data”) to Sella, and Company determines which of its customers it may communicate with using the Sella service. To the extent any data protection or privacy law applicable to your use of Sella’s Business Services recognizes the concepts of Controller and Processor and requires the conclusion of a data processing agreement between them (such as the EU General Data Protection Regulation (Regulation (EU) 2016/679, “EU GDPR”), the “UK GDPR” (as defined in the UK Data Protection Act 2018), or the Brazilian "Lei Geral de Proteção de Dados” (Law 13.709/2018, “LGPD”; "Data Privacy Law"), you acknowledge that you are the Controller and instruct the Sella entity you are contracting with, for the duration of these Business Terms, to Process any Personal Information in Customer Data on your behalf as your Processor to enable you to contact your customers on Sella pursuant to these Business Terms and the Sella Business Data Processing Terms. “Personal Information”, “Controller,” “Processor” and “Processing” in this section have the meanings set out in the Sella Business Data Processing Terms which are incorporated by reference into these Business Terms.

          Access to data, and to aggregated data. You, and your service providers who manage your Sella Business communications for you, if any, will have access via our Business Services to personal data, such as Customer Data, and Company Content that you provide to us. As part of our Business Services, Sella provides you with aggregated metrics relating to your messaging activity within our Business Services, such as the aggregate number of messages sent, delivered, and read. If you use a service provider to manage your Sella Business communications for you, then by connecting your Sella Business account and providing your service provider with account permissions, you instruct us to provide your service provider with access to these aggregated metrics.

          Ranking and Rating. If you use catalog, you determine the order and display of your goods and services in your catalog; we do not rank or use ranking parameters within catalog to display your goods or services alongside or relative to any other business’ goods or services.

          Other Information. You understand and agree that Sella collects, stores, and uses: (a) information from your business account and registration; (b) usage, log, and functional information generated from your use of our Business Services; (c) performance, diagnostics, and analytics information; (d) information related to your technical or other support requests; and (e) information about you from other sources such as other Sella users, businesses, third-party companies, and the other Meta Companies. Subject to these Business Terms and applicable law, we may share this information with the other Meta Companies, and we and the other Meta Companies will use it to develop, operate, provide, improve, understand, customize, support, and market our Business Services, our other services, and the services and products of the Meta Companies.

          Our Global Operations. Company agrees to the transfer and processing of information that we collect, store, and use under these Business Terms, to the United States and other countries globally where we have or use facilities, service providers, or partners, regardless of where you use our Business Services. You acknowledge that the laws, regulations, and standards of the country in which your information is stored or processed may be different from those of your own country.

          Legal Disclosures and Third-Party Requests. You agree that Sella may share your information, including Company Content, if we have good-faith belief that it is reasonably necessary to: (a) respond pursuant to applicable law or regulations, to legal process, or government requests; (b) enforce these Business Terms and any other applicable terms and policies, including for investigations of potential violations; (c) detect, investigate, prevent, and address fraud and other illegal activity, or security or technical issues; or (d) protect the rights, property, and safety of our users, Sella, the other Meta Companies, or others.</p>
        </li>
        <li>
          <h6>8. Availability</h6>
          <p>Our Business Services may be interrupted, including for maintenance, repairs, upgrades, or network or equipment failures. We reserve the right to discontinue some or all of our Business Services, in our sole discretion, including certain features and the support for certain devices and platforms. Events beyond our control may affect our Business Services, such as events in nature and other force majeure events.</p>
        </li>
        <li>
          <h6>9. Disclaimer</h6>
          <p>COMPANY USES OUR BUSINESS SERVICES AT ITS OWN RISK AND SUBJECT TO THE FOLLOWING DISCLAIMERS. UNLESS PROHIBITED BY APPLICABLE LAW, WE ARE PROVIDING OUR BUSINESS SERVICES ON AN “AS IS” BASIS WITHOUT ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, NON-INFRINGEMENT, AND FREEDOM FROM COMPUTER VIRUS OR OTHER HARMFUL CODE. WE DO NOT WARRANT THAT ANY INFORMATION PROVIDED BY US IS ACCURATE, COMPLETE, OR USEFUL; THAT OUR BUSINESS SERVICES OR ANY OTHER SERVICES WILL BE OPERATIONAL, ERROR FREE, SECURE, OR SAFE; OR THAT OUR BUSINESS SERVICES OR ANY OTHER SERVICES WILL FUNCTION WITHOUT DISRUPTIONS, DELAYS, OR IMPERFECTIONS. WE DO NOT CONTROL, AND ARE NOT RESPONSIBLE FOR CONTROLLING, HOW OR WHEN OUR USERS USE OUR BUSINESS SERVICES OR OTHER SERVICES, OR THE FEATURES, FUNCTIONALITIES, AND INTERFACES OUR BUSINESS SERVICES OR OTHER SERVICES PROVIDE. WE ARE NOT RESPONSIBLE FOR AND ARE NOT OBLIGATED TO CONTROL THE ACTIONS OR INFORMATION (INCLUDING CONTENT) OF OUR USERS OR OTHER THIRD PARTIES. THIS SECTION IS WITHOUT PREJUDICE TO OUR OBLIGATIONS AS A DATA PROCESSOR UNDER THE Sella BUSINESS DATA PROCESSING TERMS.

          COMPANY USES OUR BUSINESS SERVICES AT ITS OWN RISK AND SUBJECT TO THE FOLLOWING DISCLAIMERS. UNLESS PROHIBITED BY APPLICABLE LAW, WE ARE PROVIDING OUR BUSINESS SERVICES ON AN “AS IS” BASIS WITHOUT ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING BUT NOT LIMITED TO, WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE, NON-INFRINGEMENT, AND FREEDOM FROM COMPUTER VIRUS OR OTHER HARMFUL CODE. WE DO NOT WARRANT THAT ANY INFORMATION PROVIDED BY US IS ACCURATE, COMPLETE, OR USEFUL; THAT OUR BUSINESS SERVICES OR ANY OTHER SERVICES WILL BE OPERATIONAL, ERROR FREE, SECURE, OR SAFE; OR THAT OUR BUSINESS SERVICES OR ANY OTHER SERVICES WILL FUNCTION WITHOUT DISRUPTIONS, DELAYS, OR IMPERFECTIONS. WE DO NOT CONTROL, AND ARE NOT RESPONSIBLE FOR CONTROLLING, HOW OR WHEN OUR USERS USE OUR BUSINESS SERVICES OR OTHER SERVICES, OR THE FEATURES, FUNCTIONALITIES, AND INTERFACES OUR BUSINESS SERVICES OR OTHER SERVICES PROVIDE. WE ARE NOT RESPONSIBLE FOR AND ARE NOT OBLIGATED TO CONTROL THE ACTIONS OR INFORMATION (INCLUDING CONTENT) OF OUR USERS OR OTHER THIRD PARTIES. THIS SECTION IS WITHOUT PREJUDICE TO OUR OBLIGATIONS AS A DATA PROCESSOR UNDER THE Sella BUSINESS DATA PROCESSING TERMS.
          </p>
        </li>
        <li>
          <h6>10. Limitation of Liability</h6>
          <p>WE WILL NOT BE LIABLE TO COMPANY FOR ANY LOST PROFITS OR CONSEQUENTIAL, SPECIAL, PUNITIVE, INDIRECT, OR INCIDENTAL DAMAGES RELATING TO, ARISING OUT OF, OR IN ANY WAY IN CONNECTION WITH THESE BUSINESS TERMS, OUR ACTIONS OR INACTIONS, OR OUR BUSINESS SERVICES, EVEN IF WE HAVE BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. OUR AGGREGATE LIABILITY RELATING TO, ARISING OUT OF, OR IN ANY WAY IN CONNECTION WITH THESE BUSINESS TERMS, OUR ACTIONS OR INACTIONS, OR OUR BUSINESS SERVICES WILL NOT EXCEED THE GREATER OF ONE HUNDRED DOLLARS ($100) OR THE AMOUNT COMPANY HAS PAID US IN THE PAST TWELVE MONTHS TO USE OUR BUSINESS SERVICES. THE FOREGOING DISCLAIMER OF CERTAIN DAMAGES AND LIMITATION OF LIABILITY WILL APPLY TO THE MAXIMUM EXTENT PERMITTED BY APPLICABLE LAW. THE LAWS OF SOME STATES OR JURISDICTIONS MAY NOT ALLOW THE EXCLUSION OR LIMITATION OF CERTAIN DAMAGES, SO SOME OR ALL OF THE EXCLUSIONS AND LIMITATIONS SET FORTH ABOVE MAY NOT APPLY TO COMPANY. NOTWITHSTANDING ANYTHING TO THE CONTRARY IN THESE BUSINESS TERMS, IN SUCH CASES, THE LIABILITY OF Sella AND ITS DIRECTORS, OFFICERS, EMPLOYEES, AFFILIATES, AND AGENTS (“Sella PARTIES”) WILL BE LIMITED TO THE FULLEST EXTENT PERMITTED BY APPLICABLE LAW. IF YOU ARE A CALIFORNIA RESIDENT, YOU AGREE TO WAIVE CALIFORNIA CIVIL CODE § 1542, WHICH SAYS: A GENERAL RELEASE DOES NOT EXTEND TO CLAIMS WHICH THE CREDITOR DOES NOT KNOW OR SUSPECT TO EXIST IN HIS OR HER FAVOR AT THE TIME OF EXECUTING THE RELEASE, WHICH IF KNOWN BY HIM OR HER MUST HAVE MATERIALLY AFFECTED HIS OR HER SETTLEMENT WITH THE DEBTOR.</p>
        </li>
        <li>
          <h6>11. Indemnification</h6>
          <p>Company agrees to defend, indemnify, and hold harmless the Sella Parties from and against all liabilities, damages, losses, and expenses of any kind (including reasonable legal fees and costs) relating to, arising out of, or in any way in connection with any of the following (“Claim”): (a) Company’s access to or use of our Business Services, including information provided in connection therewith; (b) Company’s breach or alleged breach of these Business Terms or applicable law; and (c) any misrepresentation made by Company. We have the right to solely control, and Company will fully cooperate in the defense or settlement of any Claim.</p>
        </li>
        <li>
          <h6>12. Modifying and Terminating our Business Services</h6>
          <p>We may modify, suspend, or terminate Company’s access to or use of our Business Services and these Business Terms at any time and for any reason, permissible by applicable law, including if we determine, in our sole discretion, that Company violates these Business Terms, receives excessive negative feedback, or creates harm, risk, or possible legal exposure for us, our users, or others.

To the extent you are established in the European Union or the United Kingdom and within scope of our obligations under the Platform Regulation, we will give you 30 days' prior notice (unless a legal or regulatory obligation requires us to terminate the services in a shorter timeframe, or you have repeatedly breached your obligations under these Terms) and the relevant reasons for termination (except if we are legally restricted from giving reasons or if you have repeatedly breached these Business Terms). Company may contact Sella using our complaints system at businesscomplaints@support.Sella.com to clarify the reasons for our termination or suspension of your account. If we are able to resolve the issue in your favor, resulting in reactivating your account, then we will reinstate our Business Services to you within a reasonable time.

Upon termination, we will remove your account profile from Sella, and retain data associated with your account for up to 90 days, including data you have provided to us or which we have collected from your use of the Business Services as described in this agreement’s section on Our Data Practices. Copies of your information may also remain after the 90 days for a limited time in the backup storage that we use to recover lost data in the event of a disaster, software error, or other data loss event.

Company may terminate these Business Terms at any time for any reason by providing us written notice. Upon termination of these Business Terms for any reason, Company must promptly discontinue all use of our Business Services, and uninstall and destroy all copies of software provided by Sella, and delete any user information Company obtained in breach of these Business Terms. The following provisions will survive the termination of these Business Terms: Third-Party Services, Company's Rights, Sella’s Rights, Feedback, Availability, Disclaimer, Limitation of Liability, Indemnification, Modifying and Terminating our Business Services, Sella Confidential Information, Publicity, Legal Compliance, Governing Law and Venue, Amendment, Assignment, Severability, Miscellaneous, and Notices.</p>
        </li>
        </ul>
      </div>
      </div>
        
              </div>
      <?php require_once('footer.php'); ?>

      <!-- JavaScript files-->
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="vendor/glightbox/js/glightbox.min.js"></script>
      <script src="vendor/nouislider/nouislider.min.js"></script>
      <script src="vendor/swiper/swiper-bundle.min.js"></script>
      <script src="vendor/choices.js/public/assets/scripts/choices.min.js"></script>
      <script src="js/front.js"></script>
      <script src="js/functionalities.js" defer></script>
      <script src="js/jquery.com_jquery-3.7.0.js"></script>
      <script src="AOS - Animate on scroll library_files/jquery-1.11.3.min.js.download"></script>
		<script src="AOS - Animate on scroll library_files/highlight.min.js.download"></script>
		<script src="AOS - Animate on scroll library_files/aos.js.download"></script>
          <script>
        AOS.init({
				easing: 'ease-out-back',
				duration: 1000
			});
        // ------------------------------------------------------- //
        //   Inject SVG Sprite - 
        //   see more here 
        //   https://css-tricks.com/ajaxing-svg-sprite/
        // ------------------------------------------------------ //
        function injectSvgSprite(path) {
        
            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerphp = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }
        // this is set to BootstrapTemple website as you cannot 
        // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
        // while using file:// protocol
        // pls don't forget to change to your domain :)
        injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg'); 
        
      </script>
      <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </div>
  </body>
  <script>
    $('.formmsg').submit( function (e) {
        e.preventDefault()
        let msg = $('.message').val();

        $.ajax({
            type: "POST",
            url: "send_message.php",
            data: {
                'msg' : msg
            },
            dataType: "text",
            success: function (response) {
                $('.direct-chat-messages').append(response);
                $('.message').val('');
            }
        });
    } )
  </script>
        </html>