Read me za spiralu 4

dio pod a)
Dodana baza, veza na bazu je ("mysql:dbname=wt8;host=localhost;charset=utf8", "wt8user", "wt8pass")

dodane tabele:
1.korisnici, gdje je tabela korisniika sa username i pasvordom
2.poruke, tabela sa tesktom poruke, osobom koja je poslala poruku, i emailom, i ako je logiran korisnik, ispise i username korisnika
3.kupci, tabela kupaca sa imenom, prezimenom,adresom,emailom(opcionalno)
4.narudzbe, tabela narudzbu kolaca, kolicina, napomene itd
5.pocetna, sa novostima, obavjestenjima i ponudama koje nudi cake-shop
6.restkorisnici, tabela za rest metodu get, sa imenom prezimenom i adresom korisnika

tabele koju su povezane su tabela kupci-narudzbe(narudzba sadrzi podatke o kupcu)
i tabele poruke i korisnici, tabela poruke sadrzi polje autor koji sadrzi podatke o korisniku

dio pod b)
svi podaci iz xml se prebacuju u bazu podataka, imamo dva fajla xml korisnici.xml kupci.xml
koji imaju podatke o nekim postojecim korisnicima/kupcima i novim korisnicima/kupcima
nakon klika na dugme prebacuju se podaci iz xml u bazu podataka,
ta opcija je dostupna samo za admina, moramo se prijaviti kao administrator(username:admin, pasword:adminpass)
tek nakon logiina pokazat ce se opcija na meniju admin-opcije, klikom na meni pokazat ce se opcije koje vidi samo admin
i za jedan drugio dio spirale i za ovaj, to su dva dugmica prebavci iz xml. Podaci koji su novi unijet ce se u bazu,
dok ako su vec uneseni, nece biti ponovo uneseni u bazu podataka, imamo i druge dugmice da pregledamo ovu opciju da li je izvrsena
i da vidimo pregled poruka/korisnika.

dio pod c)
php skripte su prepravljene, svi podaci se kupe i cuvaju u bazi podataka, znaci
novoosti, obavjestenja ponude na pocetnoj stranici se kupe iz baze podataka, samo admin moze da ih mjenja u admin-opcije
ima mogucnost da izmijeni ove stvari i da spasi izmjene.
kupci i narudzbe se unoose- kupovina na meniju, i ako je kupac novi on ce se unijeti u tabelu kupci, ako je vec postojeci on se nece
unijeti u tabelu ali ce se povezati sa narudzbom foreign key, takodje moguce je obrisaati kupce i narudzbe itd.
moguce je poslati poruke, znaci meni opcija o nama->kontakt i nize ima mogucnost slanja poruke, poruke se upisuju u bazu podataka

admin moze izvrsiti pregled svih podataka klik na admin-opcije nakon logina i tu imamo sve
moguce je pregledati sve izbbaze podataka mjenjati, brisati na dugme itd,

dio pod d) 
http://index-cake-shop.44fs.preview.openshiftapps.com/
username admin pasword adminpass da se mogu vidjeti admin-opcije

dio pod e)
napravljena rest.php , metoda get, kada je ucitan rest.php ocitava se sadrzaj tabele restkorisnici iz baze,
kada dodamo na url ?ime=ajla
ucitavaju se samo korisnici cije je ime ajla,
moguce isto za prezime i adresu.
podaci se vracaju u obliku json-a

dio pod f)
izvjestaj u slikama.


**** folder spirala3, sadrzi spiralu 4 uradjenu, a ovo sam kopirala sadrzaj fog foldera vani za deploy ako budem morala promjeniti svoju konekciju u
$veza = new PDO("mysql:dbname=baza;host=mysql-55-centos7;charset=utf8", "imeKorisnika", "sifra");
