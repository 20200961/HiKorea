하이, 한국 (Hi, Korea)

한국 여행을 계획하는 분들을 위한 관광 정보 웹사이트입니다.

```
- 프로젝트 소개
서울, 인천, 부산의 주요 관광지를 지도로 확인하고, 추천 코스를 둘러보며, 다른 여행자들과 후기를 공유할 수 있는 플랫폼입니다.
주요 기능

(1) 지도: Google Maps로 관광지 위치 확인 및 상세정보 조회
(2) 코스 추천: 지역별 관광 추천 루트
(3) 갤러리: 관광지 사진 모음
(4) 게시판: 여행 후기 및 정보 공유 (로그인 필요)
(5) 회원가입/로그인: 게시판 이용을 위한 간단한 회원 시스템
```

```
- 기술 스택
HTML, CSS, JavaScript
PHP, MySQL
Google Maps API
```

- 설치 방법
```
(1) 데이터베이스 설정
MySQL에 접속해서 아래 명령어 실행:
sql-- 데이터베이스 생성
CREATE DATABASE users DEFAULT CHARACTER SET UTF8;

-- 사용자 생성
GRANT ALL PRIVILEGES ON users.* TO USER@localhost IDENTIFIED BY '1234';
데이터베이스 접속 후 테이블 생성:
sql-- 회원 정보 테이블
CREATE TABLE user_information(
    no BIGINT(100) UNSIGNED NOT NULL AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    name VARCHAR(10) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    id VARCHAR(50) NOT NULL,
    PRIMARY KEY (no)
) DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- 게시판 테이블
CREATE TABLE board(
    id INT(11) PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) DEFAULT NULL,
    content TEXT DEFAULT NULL,
    author VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

(2) 웹 서버 실행
Apache나 PHP 내장 서버로 실행:
bashphp -S localhost:8000
브라우저에서 http://localhost:8000/main.html 접속

(3) Google Maps API 키 설정
map.html과 login_map.html 파일에서 본인의 API 키로 변경:
javascript<script defer src="https://maps.googleapis.com/maps/api/js?key=본인의_API_키&callback=initMap"></script>
```

```
주요 관광지
서울: 남산타워, 북촌 한옥마을, 경복궁, 코엑스몰, 롯데월드 등
인천: 월미테마파크, 차이나타운, 송도 센트럴파크, 인천대교 등
부산: 해운대, 감천문화마을, 범어사, 자갈치시장 등
알아두면 좋은 점
```

```
게시판은 로그인해야 볼 수 있습니다
게시글 삭제는 누구나 할 수 있습니다 (실제 서비스라면 작성자만 삭제하도록 수정 필요)
DB 계정 정보(USER/1234)는 보안상 변경해서 사용
```
