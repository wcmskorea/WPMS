<?php
 return array (

    // 상수
    'IP_DISPLAY' => '\\1.♡.\\3.\\4',
    'VER' => Carbon\Carbon::now()->format('Ymd').'-1',
    'URL_REGEX' => '/(http(s)?\:\/\/)?[0-9a-zA-Z]+([\.\-]+[0-9a-zA-Z]+)*(:[0-9]+)?(\/?(\/[\.\w]*)+)?(([\?\&\=][\w]+)+)?/',

    // 사이트 설정
    'admin' => 'css@wcms.kr',
    'title' => 'WPMS v1.0',
    'description' => 'Web Project Management System v1.0',
    'keywords' => '10억홈피, 홈페이지, WCMS, WPMS',
    'filterwords' => array (0 => '18아,18놈,18새끼,18뇬,18노,18것,18넘,개년,개놈,개뇬,개새,개색끼,개세끼,개세이,개쉐이,개쉑,개쉽,개시키,개자식,개좆,게색기,게색끼,광뇬,뇬,눈깔,뉘미럴,니귀미,니기미,니미,도촬,되질래,뒈져라,뒈진다,디져라,디진다,디질래,병쉰,병신,뻐큐,뻑큐,뽁큐,삐리넷,새꺄,쉬발,쉬밸,쉬팔,쉽알,스패킹,스팽,시벌,시부랄,시부럴,시부리,시불,시브랄,시팍,시팔,시펄,실밸,십8,십쌔,십창,싶알,쌉년,썅놈,쌔끼,쌩쑈,썅,써벌,썩을년,쎄꺄,쎄엑,쓰바,쓰발,쓰벌,쓰팔,씨8,씨댕,씨바,씨발,씨뱅,씨봉알,씨부랄,씨부럴,씨부렁,씨부리,씨불,씨브랄,씨빠,씨빨,씨뽀랄,씨팍,씨팔,씨펄,씹,아가리,아갈이,엄창,접년,잡놈,재랄,저주글,조까,조빠,조쟁이,조지냐,조진다,조질래,존나,존니,좀물,좁년,좃,좆,좇,쥐랄,쥐롤,쥬디,지랄,지럴,지롤,지미랄,쫍빱,凸,퍽큐,뻑큐,빠큐,ㅅㅂㄹㅁ'),
    'ipallow' => array (0 => ''),
    'ipdeny' => array (0 => ''),
    'metatag' => '',
    'script' => '',
    'css' => '',
    'fileallow' => 'gif|jpg|jpeg|png|swf|asx|asf|wmv|wma|mpg|mpeg|mov|avi|mp3|hwp|doc|docx|xls|xlsx|ppt|pptx|zip',

    // 운영 설정
    'pointUse' => 1,
    'potinLogin' => 100,
    'pointRegist' => 1000,
    'pointSendMemo' => 0,
    'pointTerm' => 0,
    'pointRread' => 0,
    'pointWrite' => 0,
    'pointComment' => 0,
    'pointDownload' => 0,
    'pointFirstBuy' => 1000,
    'pointBirth' => 1000,
    'pointRenewal' => 1000,
    'pointRecommend' => 0,

    // 회원 설정
    'useSns' => 0,
    'useName' => 0,
    'useWebsite' => 0,
    'useTel' => 0,
    'useMobile' => 0,
    'useAddress' => 0,
    'useSignature' => 0,
    'useCertEamil' => 0,
    'useProfile' => 0,
    'defaultLevel' => 2,
    'expireNick' => 30,
    'expireDate' => 30,
    'useFilter' => array (0 => 'admin,administrator,관리자,운영자,어드민,주인장,webmaster,웹마스터,sysop,시삽,시샵,manager,매니저,메니저,root,루트,su,guest,방문객'),
    'useStipulation' => '해당 홈페이지에 맞는 회원약관을 입력합니다.',
    'usePrivacy' => '해당 홈페이지에 맞는 개인정보처리방침을 입력합니다.',
    'passwordPolicyDigits' => 6,
    'passwordPolicySpecial' => 0,
    'passwordPolicyUpper' => 0,
    'passwordPolicyNumber' => 0,

    // 메일 설정
    'emailUse' => 1,
    'emailMaster' => 'css@wcms.kr',
    'emailMasterName' => '10억홈피',
    'emailSendMaster' => 0,
    'emailSendWriter' => 0,
    'emailSendRegister' => 0,

    // 테마 설정
    'theme' => 'default',
) ;
