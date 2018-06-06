@extends('install.layout')

@section('title'){{  config('app.name')." 라이센스 확인 1/3" }}@endsection

@section('step')
    INSTALLATION
@endsection

@section('content')
<div class="container">
    <ul class="step">
        <li class="on">1. 라이센스 확인</li>
        <li>2. 초기환경설정</li>
        <li>3. 설치 완료</li>
    </ul>
    <form action="{{ route('install.license.check') }}" method="post" onsubmit="return frm_submit(this);">
        {{ csrf_field() }}
        <div class="ins_inner">
            <p>
                <strong class="st_strong">라이센스(License) 내용을 반드시 확인하십시오.</strong><br>
                라이센스에 동의하시는 경우에만 설치가 진행됩니다.
            </p>
            <div class="ins_ta ins_license">
                <textarea id="license" readonly>
프로그램 명칭  라라벨 프레임워크로 만든 게시판 (board made by laravel framework)
저작자  (주)에스아이알소프트 (sir.kr)
GNU 약소 일반 공중 사용 허가서

2.1판, 1999년 2월

Copyright (C) 1991, 1999 Free Software Foundation, Inc.
51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA

누구든지 본 사용 허가서를 있는 그대로 복제하고 배포할 수 있습니다.
그러나 본문에 대한 수정은 허용되지 않습니다.

[이 문서는 GNU 약소 일반 공중 사용 허가서의 이름으로 공표된 최초의 판본입니다.
본 사용 허가서는 GNU 라이브러리 일반 공중 사용 허가서 2판의 후속판으로 간주되기 때문에 2.1의 판번호를 갖고 있습니다.]

전 문

소프트웨어에 적용되는 대부분의 사용 허가서들은 소프트웨어에 대한 수정과 공유의 자유를 제한하려는 것을 그 목적으로 합니다. 그러나 GNU 일반 공중 사용 허가서들은 자유 소프트웨어에 대한 수정과 공유의 자유를 모든 사용자들에게 보장하기 위해서 성립된 것입니다.

본 사용 허가서인 GNU 약소 일반 공중 사용 허가서(이하, ``LGPL''이라고 칭합니다.)는 자유 소프트웨어 재단과 그밖의 저작자들이 이를 채택하기로 결정한, 주로 라이브러리와 같은 일부 특정한 소프트웨어 꾸러미에 적용됩니다. 누구든지 자신의 프로그램에 LGPL을 적용할 수 있지만, 어떤 상황에서 어떤 사용 허가서를 선택하는 것이 보다 나은 전략인지에 대해서 다음의 설명을 기준으로 먼저 신중히 고려해 보시기 바랍니다.

자유 소프트웨어라는 말에서 사용된 ``자유''라는 단어는 무료를 의미하는 금전적인 측면의 자유가 아니라 구속되지 않는다는 관점에서의 자유를 의미하며, GNU 일반 공중 사용 허가서들은 자유 소프트웨어를 이용한 복제와 개작 및 배포와 수익 사업 등의 가능한 모든 형태의 자유를 실질적으로 보장하고 있습니다. 여기에는 원시 코드의 일부 또는 전부를 원용해서 보다 개선된 프로그램을 만들거나 새로운 프로그램을 창작할 수 있는 자유가 보장되어 있으며, 자신에게 양도된 이러한 자유와 권리를 보다 명확하게 인식할 수 있도록 하기 위한 규정도 포함되어 있습니다.

소프트웨어를 양도받은 사람의 권리를 보호하기 위해서 우리는 배포자들이 이러한 권리를 부정하거나 포기하도록 피양도자에게 요구하는 행위를 금지시킬 필요가 있습니다. 이러한 금지 사항은 라이브러리를 개작하거나 배포하는 모든 사람들이 예외없이 지켜야 할 의무와 같습니다

예를 들어, LGPL 라이브러리를 배포할 경우에는 이를 유료로 판매하거나 무료로 배포하는 것에 관계없이 자신이 해당 라이브러리에 대해서 가질 수 있었던 모든 권리를 피양도자에게 그대로 양도해 주어야 하고, 라이브러리의 원시 코드를 함께 제공하거나 원시 코드를 구할 수 있는 방법을 확실히 알려주어야 합니다. 또한 라이브러리에 다른 코드를 링크시켰다면, 라이브러리를 수정한 뒤에도 정상적으로 컴파일을 진행할 수 있도록 링크 되었던 코드에 해당하는 완전한 목적 파일 전체를 함께 제공해야 합니다. 또한 피양도자에게 이러한 모든 사항들을 분명히 알 수 있도록 해 주어야 합니다.

자유 소프트웨어 재단은 다음과 같은 두 가지 단계를 통해서 사용자들의 권리를 보호합니다. (1) 라이브러리에 저작권을 설정합니다. (2) 저작권의 양도에 관한 실정법에 의해서 유효한 법률적 효력을 갖는 LGPL을 통해서 소프트웨어를 복제하거나 개작 및 배포할 수 있는 권리를 사용자에게 부여합니다.

모든 배포자들을 보호하기 위해서 우리는 자유 라이브러리에 대한 어떠한 보증도 제공하지 않는다는 점을 명확히 밝혀둡니다. 라이브러리를 사용하는 사람들은 반복적인 재배포 과정을 통해 라이브러리 자체에 수정과 변형이 일어날 수도 있으며, 이는 최초의 저작자가 만든 라이브러리가 갖고 있는 문제가 아닐 수 있다는 개연성을 인식하고 있어야 합니다. 우리는 개작과 재배포 과정에서 다른 사람에 의해 발생된 문제로 인해 라이브러리의 원저작자의 신망이 실추되는 것을 원하지 않습니다.

특허 제도는 자유 소프트웨어의 존재를 위협하는 요소일 수밖에 없습니다. 우리는 특허권자로부터 기업이 제한적인 사용 허가를 얻은 뒤에 이를 통해 자유 프로그램의 사용자들을 규제할 수 없게 되기를 희망합니다. 따라서 우리는 특정한 버전의 라이브러리에 대한 어떠한 특허 사용 허가의 취득도 LGPL에 규정된 자유를 완전히 만족시키는 범위 내에서 이루어 져야 할 것을 요구합니다.

몇몇 라이브러리를 포함한 대부분의 GNU 소프트웨어에는 GPL이 적용됩니다. 본 사용 허가서인 LGPL은 특정한 라이브러리에만 적용되며 GPL과는 상당히 다른 면을 갖고 있습니다. LGPL은 특정한 라이브러리가 자유 소프트웨어가 아닌 프로그램과 함께 링크되는 것을 허용하려는 목적으로 사용됩니다.

어떤 프로그램이 라이브러리와 함께 링크된다면, 라이브러리가 정적으로 링크되든지 공유 라이브러리로 사용되든지 간에 이 두개의 조합은 법적으로 말할 때 결합 저작물, 즉 최초의 라이브러리로부터 파생된 2차적 저작물로 간주됩니다. GPL은 이러한 형태의 링크가 일어날 경우에 결합된 전체 저작물이 GPL을 만족할 때에 한해서만 링크를 허용합니다. 그러나 LGPL은 보다 유연한 링크 조건을 허용하고 있습니다.

우리가 본 사용 허가서를 ``약소'' 일반 공중 사용 허가서라고 부르는 이유는 사용자들의 자유를 보호하는 강도를 GPL보다 경감시켰기 때문입니다. 또한 LGPL은 자유 소프트웨어가 아닌 프로그램과 경쟁하는데 있어서 자유 소프트웨어 개발자들에게 GPL보다 이점을 덜 제공합니다. 우리가 많은 종류의 라이브러리에 LGPL이 아닌 일반적인 GPL을 사용하는 것은 이러한 이유 때문입니다. 그러나 특수한 상황에서는 오히려 LGPL을 사용하는 것이 유리할 수 있습니다.

극히 드문 예이긴 하지만, 어떤 라이브러리의 사용 폭을 가능한 넓게 유도해서 그것을 사실상의 표준으로 만들어야 할 특별한 필요가 있다고 생각해 봅시다. 이것을 가능하게 만들기 위해서는 자유 소프트웨어가 아닌 프로그램도 이러한 라이브러리를 사용할 수 있도록 허용해야 합니다. 이보다 흔한 또 한가지 예로 자유 소프트웨어가 아닌 라이브러리가 폭넓게 사용되고 있을 때 이와 동일한 기능을 제공하는 자유 라이브러리가 만들어진 경우를 생각해 볼 수 있습니다. 이러한 상황에서는 자유 라이브러리의 사용을 자유 소프트웨어에만 한정함으로써 얻을 수 있는 이익이 거의 없습니다. 이런 경우에 우리는 LGPL을 사용합니다.

또 하나의 예는 자유 소프트웨어가 아닌 프로그램에 특정한 라이브러리의 사용을 허용함으로써 보다 많은 사람들이 자유 소프트웨어를 사용할 수 있게 만드는 경우입니다. 예를 들면, 자유 소프트웨어가 아닌 프로그램들이 GNU C 라이브러리를 사용할 수 있도록 허용해서 사람들이 GNU 운영체제와 GNU/리눅스 운영체제를 사용하도록 유도할 수 있습니다.

LGPL이 사용자의 자유를 보다 약소적으로 보호하고 있음에도 불구하고, LGPL로 설정된 라이브러리와 링크된 프로그램을 사용하는 사용자는 라이브러리가 개작되더라도 개작된 버전을 사용해서 프로그램을 실행할 수 있는 확실한 자유와 이에 필요한 수단을 갖고 있습니다.

복제와 개작 및 배포에 관련된 구체적인 조건과 규정은 다음과 같습니다. ``라이브러리에 기반한 저작물''과 ``라이브러리를 사용하는 저작물''의 차이에 특별한 주의를 기울이기 바랍니다. 전자는 라이브러리로부터 파생된 코드를 담고 있는 저작물을 의미하는데 반해서 후자는 실행되기 위해서 라이브러리와 결합되어야 하는 저작물을 말합니다.

복제와 개작 및 배포에 관한 조건과 규정

제 0 조. 본 사용 허가 계약은 GNU 약소 일반 공중 사용 허가서(이하, ``LGPL''이라고 칭합니다.)의 규정에 따라 배포될 수 있다는 사항이 저작권자 또는 그에 준하는 정당한 권리을 갖고 있는 자에 의해서 명시된 모든 종류의 소프트웨어 라이브러리와 컴퓨터 프로그램 저작물(이하, ``프로그램''이라고 칭합니다.)에 대해서 동일하게 적용됩니다. ``피양도자''란 LGPL의 규정에 따라 프로그램을 양도받은 사람을 의미합니다.

``라이브러리''란 소프트웨어 함수와 데이터를 함께 또는 개별적으로 수집해 놓은 것으로 이들 중 일부를 사용하는 응용 프로그램과 링크되어 실행물을 생성하는데 편리하도록 미리 준비된 것을 의미합니다.

이하로 언급되는 ``라이브러리''는 본 사용 허가서에 의해서 배포되고 있는 모든 소프트웨어 라이브러리와 저작물을 의미합니다. ``라이브러리에 기반한 저작물''은 라이브러리 또는 저작권법에 따른 라이브러리의 2차적 저작물을 모두 의미합니다. 다시 말하면, 전술한 라이브러리 자신 또는 저작권법의 규정에 따라 라이브러리의 전부 또는 상당 부분을 원용하거나 다른 언어로의 번역을 포함할 수 있는 개작 과정을 통해서 창작된 새로운 라이브러리와 이와 관련된 저작물입니다. (이후로 다른 언어로의 번역은 별다른 제한없이 개작의 범위에 포함되는 것으로 간주합니다.)

저작물에 대한 ``원시 코드''란 해당 저작물을 개작하기에 적절한 형식을 의미합니다. 라이브러리에 대한 완전한 원시 코드란 라이브러리에 포함된 모든 모듈들의 원시 코드와 이와 관련된 인터페이스 정의 파일 모두, 그리고 라이브러리의 컴파일과 설치를 제어하는데 사용된 스크립트 전부를 의미합니다.

본 허가서는 복제와 개작 및 배포 행위에 대해서만 적용됩니다. 따라서 라이브러리를 사용하는 프로그램을 실행시키는 행위에 대한 제한은 없습니다. 이러한 프로그램의 결과물에는, 결과물을 생성하기 위한 도구로 라이브러리가 사용되었는지 아닌지의 여부에 관계없이 결과물이 라이브러리에 기반한 2차적 저작물을 구성했을 때에 한해서 본 허가서의 규정들이 적용됩니다. 2차적 저작물의 구성 여부는 2차적 저작물 안에서의 라이브러리의 역할과 라이브러리를 사용한 프로그램의 역할을 토대로 판단합니다.

제 1 조. 적절한 저작권 표시와 라이브러리에 대한 보증이 제공되지 않는다는 사실을 각각의 복제물에 명시하는 한, 피양도자는 라이브러리의 원시 코드를 자신이 양도받은 상태 그대로 어떠한 매체를 통해서도 복제하고 배포할 수 있습니다. 복제와 배포가 이루어 질 때는 본 허가서와 라이브러리에 대한 보증이 제공되지 않는다는 사실에 대해서 언급되었던 모든 내용들을 그대로 유지시켜야 하며, 영문판 LGPL을 함께 제공해야 합니다.

배포자는 복제물을 물리적으로 인도하는데 소요된 비용을 청구할 수 있으며, 선택 사항으로 독자적인 유료 보증을 설정할 수 있습니다.

제 2 조. 피양도자는 자신이 양도받은 라이브러리의 전부나 일부를 개작할 수 있으며, 이를 통해 라이브러리에 기반한 2차적 저작물을 창작할 수 있습니다. 개작된 라이브러리나 창작된 2차적 저작물은 다음의 사항들을 모두 만족시키는 조건에 한해서, 제1조의 규정에 따라 또다시 복제되고 배포될 수 있습니다.

제 1 항. 개작된 저작물은 반드시 소프트웨어 라이브러리여야 합니다.
제 2 항. 파일을 개작할 때는 파일을 개작한 사실과 그 날짜를 파일 안에 명시해야 합니다.
제 3 항. 저작물 전체에 대한 사용 권리를 본 허가서의 규정에 따라 공중에게 무상으로 허용해야 합니다.
제 4 항. 개작된 라이브러리에 포함된 기능이 그 기능을 사용하는 응용 프로그램으로부터 제공되는 함수나 데이터 테이블을 참조하는 경우에는, 이러한 기능이 호출되었을 때 매개 인수를 전달하는 경우를 제외하고는 응용 프로그램이 그러한 함수나 테이블을 제공하지 않는 경우에도 기능이 독립적으로 수행되고 목적하는 모든 부분이 확실하게 유효할 수 있도록 최대의 노력을 기울여야만 합니다

(예를 들면, 라이브러리에 포함된 제곱근 연산 함수는 응용 프로그램으로부터 명확하고 완전하게 독립적인 형태로 만들어져야 합니다. 따라서 제2조 4항은 제곱근 연산 함수가 어떠한 응용 프로그램이 제공하는 함수나 테이블도 필수적으로 사용되는 않는 형태로 만들어져야 한다는 것을 규정합니다. 즉, 응용 프로그램이 제공하는 기능 없이도 제곱근 연산 함수가 제곱근을 구할 수 있어야 합니다.)
위의 조항들은 개작된 라이브러리 전체에 적용됩니다. 만약, 개작된 라이브러리에 포함된 특정 부분이 라이브러리부터 파생된 것이 아닌 별도의 독립 저작물로 인정될 만한 상당한 이유가 있을 경우에는 해당 저작물의 개별적인 배포에는 본 허가서의 규정들이 적용되지 않습니다. 그러나 이러한 저작물이 라이브러리에 기반한 2차적 저작물의 일부로서 함께 배포된다면 개별적인 저작권과 배포 기준에 상관없이 저작물 모두가 본 허가서에 의해서 관리되어야 하며, 전체 저작물에 대한 사용 권리는 공중에게 무상으로 양도됩니다.

이러한 규정은 개별적인 저작물에 대한 저작자들의 권리를 침해하거나 인정하지 않으려는 것이 아니라, 라이브러리로부터 파생된 2차적 저작물이나 수집 저작물의 배포를 일관적으로 규제할 수 있는 권리를 행사하기 위한 것입니다.

라이브러리나 라이브러리로부터 파생된 2차적 저작물을 이들로부터 파생되지 않은 다른 저작물과 함께 단순히 저장하거나 배포하기 위한 목적으로 동일한 매체에 모아 놓은 집합물의 경우에는, 라이브러리로부터 파생되지 않은 다른 저작물에는 본 허가서의 규정들이 적용되지 않습니다.

제 3 조. 피양도자는 자신이 양도받은 라이브러리의 복제물에 LGPL 대신 GPL의 규정을 적용할 수 있습니다. 이것이 가능하기 위해서는 LGPL에 대해서 언급되었던 모든 사항을 GPL 2판으로 대체시켜야 합니다. (GPL 2판보다 신판이 공표되었을 경우에는 원한다면 신판의 판번호를 사용할 수 있습니다.) 그 이외에 다른 사항들은 변경할 수 없습니다.

복제물에 대해서 이러한 수정이 이루어 졌을 경우에는 GPL로 변경된 사용권 허가를 다시 변경할 수 없으며, 이에 따라서 해당 복제물을 기반으로 만들어진 모든 저작물과 복제물에는 GPL이 적용되어야만 합니다.

이러한 선택 사항은 라이브러리의 코드 일부분을 라이브러리가 아닌 일반 프로그램에 포함시키고자 할 경우에 유용합니다.

제 4 조. 피양도자는 제1조와 제2조의 규정에 따라 라이브러리(또는 제2조에 의한 라이브러리의 일부나 라이브러리에 기반한 2차적 저작물)를 목적 코드나 실행물의 형태로 복제하고 배포할 수 있습니다. 이 때 목적 코드나 실행물에 상응하는 컴퓨터가 인식할 수 있는 완전한 원시 코드를 제1조와 제2조의 규정에 따라 소프트웨어의 교환을 위해서 일반적으로 사용되는 매체를 통해 함께 제공해야 합니다.

목적 코드를 지정한 장소로부터 복제해 갈 수 있게 하는 방식으로 배포할 경우, 동일한 장소로부터 원시 코드를 복제할 수 있는 동등한 접근 방법을 제공한다면 이는 원시 코드가 목적 코드와 함께 복제되도록 설정되지 않았다 하더라도 원시 코드를 배포하는 것으로 간주됩니다.

제 5 조. 라이브러리의 어떠한 부분으로부터의 파생물도 포함하지 않지만, 컴파일 또는 링크를 통해서 라이브러리와 함께 작동하도록 설계된 프로그램은 ``라이브러리를 사용하는 저작물''이 됩니다. 이러한 저작물이 별도로 분리되어 있을 때는 라이브러리에 대한 파생물이 아니므로 본 사용 허가서가 적용되지 않습니다.

그러나 ``라이브러리를 사용하는 저작물''이 라이브러리와 링크된 결과로 생성된 실행물은, 실행물 안에 라이브러리의 일부를 포함하고 있기 때문에 라이브러리에 기반한 2차적 저작물을 구성하게 됩니다. 따라서 이러한 방식으로 생성된 실행물은 본 사용 허가서의 적용을 받습니다. 제6조는 이러한 종류의 실행물의 배포를 위한 규정을 담고 있습니다.

``라이브러리를 사용하는 저작물''이 라이브러리의 일부인 헤더 파일의 자료를 사용한 경우에는 그러한 저작물의 원시 코드가 라이브러리에 기반한 2차적 저작물이 아니었다 하더라도 목적 코드는 라이브러리에 기반한 2차적 저작물이 될 수 있습니다. 이러한 구분이 성립될 수 있는지의 여부는 그러한 저작물 자체가 라이브러리이거나 저작물에 사용된 라이브러리 없이도 링크될 수 있는 경우에 있어서 매우 중요한 차이를 갖습니다. 그러나 이러한 구분이 성립될 수 있는 명확한 판단 기준은 법률적으로 정의되어 있지 않습니다.

만약 이와같은 형태의 목적 파일이 단지 숫자 매개 변수와 자료 구조의 설계 형태 및 이에 대한 접근 도구 그리고 10행 미만으로 이루어진 작은 인라인 함수와 매크로만을 사용하는 것이라면 법적 기준에 의한 2차적 저작물의 성립 여부에 관계없이 그 사용이 제한되지 않습니다. (그러나 이러한 목적 코드와 라이브러리의 일부가 함께 포함된 실행물은 여전히 제6조의 적용을 받습니다.)

저작물이 라이브러리에 기반한 2차적 저작물이라면 해당 저작물에 대한 목적 코드는 제6조에 따라 배포될 수 있습니다. 또한 그러한 저작물을 포함한 실행물들은 기반이 된 라이브러리에 직접 링크되는지 아닌지의 여부에 관계없이 모두 제6조의 적용을 받습니다.

제 6 조. 위의 조항들에 대한 예외의 하나로, 라이브러리와 ``라이브러리를 사용하는 저작물''을 함께 결합하거나 링크시켜서 라이브러리의 일부분이 포함된 저작물을 만들었다면, 이를 자신이 선택한 규정에 따라 배포할 수 있습니다. 이 경우 배포 규정에는 피양도자들이 자신의 필요에 따라 저작물을 개작할 수 있으며 개작에 따른 디버깅을 위해 코드역분석(reverse regineering)을 허용한다는 사항이 포함되어야 합니다.

라이브러리와 라이브러리의 사용에는 본 사용 허가서가 적용된다는 것과 저작물 안에 이러한 라이브러리가 사용되고 있다는 사실을 담고 있는 안내 문구를 모든 복제물에 분명하게 명시해야 합니다. 또한 영문판 LGLP 사본을 함께 제공해야 합니다. 저작물이 실행될 때 저작권 사항이 표시되는 형태를 취하고 있다면 라이브러리에 대한 저작권 사항도 함께 포함시켜야 하며 LGPL 사본을 참고할 수 있는 방법을 명시해야 합니다. 또한 다음 중 하나의 사항을 반드시 만족시켜야 합니다.

제 1 항. 저작물에 포함된 라이브러리에 어떠한 수정이 가해졌다 하더라도 해당 라이브러리에 대한 컴퓨터가 인식할 수 있는 완전한 형태의 원시 코드를 저작물과 함께 제공해야 합니다. 이 원시 코드는 제1조와 제2조의 규정에 따라 배포될 수 있어야 합니다. 만약 저작물이 라이브러리와 링크되는 실행물이었을 경우에는 피양도자가 실행물과 링크되는 라이브러리를 개작한 뒤에도 링크를 통해 새로운 실행물을 만들 수 있도록 하기 위해서 ``라이브러리를 사용한 저작물''로서 배포된 저작물에 해당하는 컴퓨터가 인식할 수 있는 완전한 형태의 원시 코드와 목적 코드 중 하나 또는 둘 모두를 제공해야 합니다. (라이브러리에 포함된 정의 파일의 내용을 수정한 경우에는 변경된 정의 부분을 사용하기 위해서 응용 프로그램을 반드시 다시 컴파일할 필요는 없다는 점은 인정됩니다.)

제 2 항. 라이브러리는 적절한 공유 라이브러리 방식을 사용해서 링크되어야 합니다. 적절한 방식이란, (1) 라이브러리의 함수를 실행물 속으로 직접 복제하는 것이 아니라 실행 시점에서 볼 때 이미 사용자의 컴퓨터 시스템 상에 존재하고 있는 라이브러리의 복제물이 사용되는 것입니다. 또한 (2) 사용자가 개작된 라이브러리를 설치한 경우에도 개작된 라이브러리가 저작물을 만들 때 사용된 라이브러리의 버전과 인터페이스상으로 호환되는 한, 적절하게 동작할 수 있어야 합니다.

제 3 항. 배포에 필요한 최소한의 비용만을 받고 피양도자에게 제6조 1항에 규정된 자료를 배포하겠다는, 최소한 3년간 유효한 약정서를 저작물과 함께 제공해야 합니다.

제 4 항. 저작물을 지정한 장소로부터 복제해 갈 수 있게 하는 방식으로 배포하는 경우, 동일한 장소로부터 제6조 1항에 규정된 자료를 복제할 수 있는 동등한 접근 방법을 제공하는 것은 저작물에 대한 배포 조건을 충족하는 것으로 간주됩니다.

제 5 항. 피양도자가 제6조 1항에 규정된 자료의 복제물을 이미 수령했는지를 확인하거나 자신이 피양도자에게 그러한 자료를 이미 송부했는지를 확인해야 합니다.
실행물이 ``라이브러리를 사용하는 저작물''의 형태로 배포된다면 여기에는 실행물을 재생산하기 위해서 필요한 유틸리티 프로그램과 데이터들이 모두 포함되어야 합니다. 그러나 특별한 예외의 하나로서, 실행물이 실행될 운영체제의 주요 부분(컴파일러나 커널 등)과 함께 (원시 코드나 바이너리의 형태로) 일반적으로 배포되는 구성 요소들은 이러한 구성 요소 자체가 실행물에 수반되지 않는한 배포 대상에서 제외되어도 무방합니다.

이러한 규정이 일반적으로 운영체제에 함께 수반되지 않는 독점 라이브러리들의 사용 허가서와 충돌하게 될 경우에는 배포하고자 하는 실행물 안에 본 사용 허가서가 적용되는 라이브러리와 독점 라이브러리를 함께 사용할 수 없습니다.

제 7 조. 라이브러리에 기반한 저작물로서의 라이브러리의 일부를 본 사용 허가서가 적용되지 않는 다른 라이브러리의 일부와 하나의 라이브러리 안에 병존시킬 수 있습니다. 이러한 결합 라이브러리를 배포할 경우에는 라이브러리에 기반한 저작물과 그렇지 않은 라이브러리가 별도로 배포될 수 있음을 명시해야 하며 다음의 두가지 사항을 준수해야 합니다.

제 1 항. 결합 라이브러리를 구성하고 있는 ``라이브러리에 기반한 저작물''의 복제물을 결합되지 않은 독립된 상태로 함께 제공해야 합니다. 이 복제물의 배포에는 위의 조항들이 적용됩니다.

제 2 항. 라이브러리에 기반한 저작물의 일부가 결합 라이브러리 안에 포함하고 있다는 사실을 명시해야 하며, 제7조 1항에 의해서 제공된 결합되지 않은 상태의 ``라이브러리에 기반한 저작물''의 위치 정보를 명기해야 합니다.
제 8 조. 본 허가서에 의해서 명시적으로 이루어 지지 않는 한 라이브러리에 대한 복제와 개작, 하위 허가권 설정과 링크 및 배포가 이루어 질 수 없습니다. 이와 관련된 어떠한 행위도 무효이며 본 허가서가 보장한 권리는 자동으로 소멸됩니다. 그러나 본 허가서의 규정에 따라 라이브러리의 복제물이나 권리를 양도받았던 제3자는 본 허가서의 규정들을 준수하는 한, 배포자의 권리 소멸에 관계없이 사용상의 권리를 계속해서 유지할 수 있습니다.

제 9 조. 본 허가서는 서명이나 날인이 수반되는 형식을 갖고 있지 않기 때문에 피양도자가 본 허가서의 내용을 반드시 받아들여야 할 필요는 없습니다. 그러나 라이브러리나 라이브러리에 기반한 2차적 저작물에 대한 개작 및 배포를 허용하는 것은 본 허가서에 의해서만 가능합니다. 만약 본 허가서에 동의하지 않을 경우에는 이러한 행위들이 법률적으로 금지됩니다. 따라서 라이브러리(또는 라이브러리에 기반한 2차적 저작물)을 개작하거나 배포하는 행위는 이에 따른 본 허가서의 내용에 동의한다는 것을 의미하며, 복제와 개작 및 배포에 관한 본 허가서의 조건과 규정들을 모두 받아들이겠다는 의미로 간주됩니다.

제 10 조. 피양도자에 의해서 라이브러리(또는 라이브러리에 기반한 2차적 저작물)이 반복적으로 재배포될 경우, 각 단계에서의 피양도자는 본 허가서의 규정에 따른 라이브러리의 복제와 개작, 링크, 배포에 대한 권리를 최초의 양도자로부터 양도받은 것으로 자동적으로 간주됩니다. 라이브러리(또는 라이브러리에 기반한 2차적 저작물)을 배포할 때는 피양도자의 권리의 행사를 제한할 수 있는 어떠한 사항도 추가할 수 없습니다. 그러나 피양도자에게 재배포가 일어날 시점에서의 제3의 피양도자에게 본 허가서를 준수하도록 강제할 책임은 부과되지 않습니다.

제 11 조. 법원의 판결이나 특허권 침해에 대한 주장 또는 특허 문제에 국한되지 않은 그밖의 이유들로 인해서 본 허가서의 규정에 배치되는 사항이 발생한다 하더라도 그러한 사항이 선행하거나 본 허가서의 조건과 규정들이 면제되는 것은 아닙니다. 따라서 법원의 명령이나 합의 등에 의해서 본 허가서에 위배되는 사항들이 발생한 상황이라도 양측 모두를 만족시킬 수 없다면 라이브러리는 배포될 수 없습니다. 예를 들면, 특정한 특허 관련 허가가 라이브러리의 복제물을 직접 또는 간접적인 방법으로 양도받은 임의의 제3자에게 해당 라이브러리를 무상으로 재배포할 수 있게 허용하지 않는다면, 그러한 허가와 본 사용 허가를 동시에 만족시키면서 라이브러리를 배포할 수 있는 방법은 없습니다.

본 조항은 특정한 상황에서 본 조항의 일부가 유효하지 않거나 적용될 수 없을 경우에도 본 조항의 나머지 부분들을 적용하기 위한 의도로 만들어 졌습니다. 따라서 그 이외의 상황에서는 본 조항을 전체적으로 적용하면 됩니다.

본 조항의 목적은 특허나 저작권 침해 등의 행위를 조장하거나 해당 권리를 인정하지 않으려는 것이 아니라, 공중 사용 허가서들을 통해서 구현되어 있는 자유 소프트웨어의 배포 체계를 통합적으로 보호하기 위한 것입니다. 많은 사람들이 배포 체계에 대한 신뢰있는 지원을 계속해 줌으로써 소프트웨어의 다양한 분야에 많은 공헌을 해 주었습니다. 소프트웨어를 어떠한 배포 체계를 통해 배포할 것인가를 결정하는 것은 전적으로 저작자와 기증자들의 의지에 달려있는 것이지, 일반 사용자들이 강요할 수 있는 문제는 아닙니다.

본 조항은 본 허가서의 다른 조항들에서 무엇이 중요하게 고려되어야 하는 지를 명확하게 설명하기 위한 목적으로 만들어진 것입니다

제 12 조. 특허나 저작권이 설정된 인터페이스로 인해서 특정 국가에서 라이브러리의 배포와 사용이 함께 또는 개별적으로 제한되어 있는 경우, 본 사용 허가서를 라이브러리에 적용한 최초의 저작권자는 문제가 발생하지 않는 국가에 한해서 라이브러리를 배포한다는 배포상의 지역적 제한 조건을 명시적으로 설정할 수 있으며, 이러한 사항은 본 허가서의 일부로 간주됩니다.

제 13 조. 자유 소프트웨어 재단은 때때로 본 사용 허가서의 개정판이나 신판을 공표할 수 있습니다. 새롭게 공표될 판은 당면한 문제나 현안을 처리하기 위해서 세부적인 내용에 차이가 발생할 수 있지만, 그 근본 정신에는 변함이 없을 것입니다.

각각의 판들은 판번호를 사용해서 구별됩니다. 특정한 판번호와 그 이후 판을 따른다는 사항이 명시된 라이브러리에는 해당 판이나 그 이후에 발행된 어떠한 판을 선택해서 적용해도 무방하고, 판번호를 명시하고 있지 않은 경우에는 자유 소프트웨어 재단이 공표한 어떠한 판번호의 판을 적용해도 무방합니다.

제 14 조. 라이브러리의 일부를 본 허가서와 배포 기준이 다른 자유 프로그램과 함께 결합하고자 할 경우에는 해당 프로그램의 저작자로부터 서면 승인을 받아야 합니다. 자유 소프트웨어 재단이 저작권을 갖고 있는 소프트웨어의 경우에는 자유 소프트웨어 재단의 승인을 얻어야 합니다. 우리는 이러한 요청을 수락하기 위해서 때때로 예외 기준을 만들기도 합니다. 자유 소프트웨어 재단은 일반적으로 자유 소프트웨어의 2차적 저작물들을 모두 자유로운 상태로 유지시키려는 목적과 소프트웨어의 공유와 재활용을 증진시키려는 두가지 목적을 기준으로 승인 여부를 결정할 것입니다.

보증의 결여 (제15조, 제16조)

제 15 조. 본 허가서를 따르는 라이브러리는 무상으로 양도되기 때문에 관련 법률이 허용하는 한도 내에서 어떠한 형태의 보증도 제공되지 않습니다. 라이브러리의 저작권자와 배포자가 공동 또는 개별적으로 별도의 보증을 서면으로 제공할 때를 제외하면, 특정한 목적에 대한 라이브러리의 적합성이나 상업성 여부에 대한 보증을 포함한 어떠한 형태의 보증도 명시적이나 묵시적으로 설정되지 않은 ``있는 그대로의'' 상태로 이 라이브러리를 배포합니다. 라이브러리와 라이브러리의 실행에 따라 발생할 수 있는 모든 위험은 피양도자에게 인수되며 이에 따른 보수 및 복구를 위한 제반 경비 또한 피양도자가 모두 부담해야 합니다.

제 16 조. 저작권자나 배포자가 라이브러리의 손상 가능성을 사전에 알고 있었다 하더라도 발생된 손실이 관련 법규에 의해 보호되고 있거나 이에 대한 별도의 서면 보증이 설정된 경우가 아니라면, 저작권자나 라이브러리를 원래의 상태 또는 개작한 상태로 제공한 배포자는 라이브러리의 사용이나 비작동으로 인해 발생된 손실이나 라이브러리 자체의 손실에 대해 책임지지 않습니다. 이러한 면책 조건은 사용자나 제3자가 라이브러리를 조작함으로써 발생된 손실이나 다른 소프트웨어와 라이브러리를 함께 동작시키는 것으로 인해서 발생된 데이터의 상실 및 부정확한 산출 결과에만 국한되는 것이 아닙니다. 발생된 손실의 일반성이나 특수성 뿐 아니라 원인의 우발성 및 필연성도 전혀 고려되지 않습니다.

복제와 개작 및 배포에 관한 조건과 규정의 끝.

새로운 라이브러리에 LGPL을 적용하는 방법

새로운 라이브러리를 개발하고 그 라이브러리가 보다 많은 사람들에게 최대한 유용하게 사용되기를 원한다면, 본 허가서나 GNU 일반 공중 사용 허가서를 선택적으로 적용해서 누구나 자유롭게 개작하고 재배포할 수 있는 자유 소프트웨어로 만드는 것이 최선의 방법입니다.

라이브러리를 자유 소프트웨어로 만들기 위해서는 다음과 같은 사항을 라이브러리에 추가하면 됩니다. 라이브러리에 대한 보증이 제공되지 않는다는 사실을 가장 효과적으로 전달할 수 있는 방법은 원시 코드 파일의 시작 부분에 이러한 사항을 추가하는 것입니다. 각각의 파일에는 최소한 저작권을 명시한 행과 본 사용 허가서의 전체 내용을 참고할 수 있는 위치 정보를 명시해야 합니다.

라이브러리의 이름과 용도를 한 줄 정도로 설명합니다.
Copyright (C) 20yy년 <프로그램 저작자의 이름>

이 라이브러리는 자유 소프트웨어입니다. 소프트웨어의 피양도자는 자유 소프트웨어 재단이 공표한 GNU 약소 일반 공중 사용 허가서 2.1판 또는 그 이후 판을 임의로 선택해서, 그 규정에 따라 라이브러리를 개작하거나 재배포할 수 있습니다.

이 라이브러리는 유용하게 사용될 수 있으리라는 희망에서 배포되고 있지만, 특정한 목적에 맞는 적합성 여부나 판매용으로 사용할 수 있으리라는 묵시적인 보증을 포함한 어떠한 형태의 보증도 제공하지 않습니다. 보다 자세한 사항에 대해서는 GNU 약소 일반 공중 사용 허가서를 참고하시기 바랍니다.

GNU 약소 일반 공중 사용 허가서는 이 라이브러리와 함께 제공됩니다. 만약, 이 문서가 누락되어 있다면 자유 소프트웨어 재단으로 문의하시기 바랍니다. (자유 소프트웨어 재단: Free Software Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA)
또한, 사용자들이 라이브러리를 배포한 사람에게 전자 메일과 서면으로 연락할 수 있는 정보를 추가해야 합니다

만약, 라이브러리의 저작자가 학교나 기업과 같은 단체나 기관에 프로그래머로 고용되어 있다면 라이브러리의 자유로운 배포를 위해서 고용주나 해당 기관장으로부터 라이브러리에 대한 저작권 포기 각서를 받아야 합니다. 예를 들면 다음과 같은 형식이 될 수 있다. (아래의 문구를 실제로 사용할 경우에는 예로 사용된 이름들을 실제 이름으로 대체하면 됩니다.)

본사는 제임스 해커가 만든 (설정 옵션을 조정하기 위한) `Frob' 라이브러리에 관련된 모든 저작권을 포기합니다.

1990년 4월 1일

Yoyodye, Inc., 부사장: Ty Coon

서명: Ty Coon의 서명
이것이 필요한 작업의 전부입니다!
                </textarea>
            </div>
            <div id="ins_agree">
                <input type="checkbox" name="agree" value="yes" id="agree">
                <label for="agree">동의합니다.</label>
            </div>
            <div class="inner_btn">
                <input type="submit" class="btn" value="다음">
            </div>
        </div>
    </form>
</div>
<script>
function frm_submit(f)
{
    if (!f.agree.checked) {
        alert("라이센스 내용에 동의하셔야 설치가 가능합니다.");
        return false;
    }
    return true;
}
</script>
@endsection
