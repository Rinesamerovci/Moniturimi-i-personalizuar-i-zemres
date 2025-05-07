# Plani i Sprintit 2 - Monitorimi i Personalizuar i Zemrës

## Qëllimi i Sprintit
Implementimi i funksionaliteteve për aksesin në të dhënat e kaluara, eksportimin e raporteve shëndetësore, dhe ndërfaqen për komente nga mjekët. Gjithashtu, do të fokusohemi në integrimin me pajisje të veshshme për mbledhjen automatike të të dhënave të zemrës.

## Kohëzgjatja e Sprintit
1 javë (13 Maj - 19 Maj, 2025)

## Tregimet e Përdoruesit të Zgjedhura dhe Detyrat (Tasks)

### 1. Akses në të dhënat e kaluara (Mesatare)
**Si pacient, dua të shoh historikun e rrahjeve të zemrës që të mund të analizoj gjendjen time shëndetësore.**

#### Tasks:
- **Task 1.1:** Krijimi i një interfejsi të përdoruesit për shfaqjen e historikut të rrahjeve të zemrës.
- **Task 1.2:** Integrimi i databazës për të marrë të dhënat historike të rrahjeve të zemrës.
- **Task 1.3:** Implementimi i filtrave për datat dhe periudhat specifike të historikut të zemrës.
- **Task 1.4:** Testimi i shfaqjes së saktë të të dhënave në panelin e përdoruesit.

### 2. Eksportimi i raporteve shëndetësore (Mesatare)
**Si përdorues, dua të eksportoj të dhënat e zemrës në format PDF ose CSV që t’i ndaj me mjekun tim.**

#### Tasks:
- **Task 2.1:** Krijimi i butonit për eksportimin e raporteve në format PDF dhe CSV.
- **Task 2.2:** Zhvillimi i logjikës për formimin e raporteve nga të dhënat e mbledhura për rrahjet e zemrës.
- **Task 2.3:** Implementimi i mundësisë për eksportimin e raporteve në formatet PDF dhe CSV.
- **Task 2.4:** Testimi i eksportimit dhe verifikimi që të dhënat janë të sakta në të dy formatet.

### 3. Ndërfaqe për komente nga mjekët (Mesatare)
**Si mjek, dua të komentoj mbi raportet e pacientëve që të jap vlerësime dhe këshilla përmes sistemit.**

#### Tasks:
- **Task 3.1:** Krijimi i një interfejsi për mjekët ku mund të shohin raportet e pacientëve.
- **Task 3.2:** Zhvillimi i mundësisë për mjekët të shtojnë komente për secilin raport të pacientëve.
- **Task 3.3:** Ruajtja e komenteve të mjekëve në databazë dhe lidhja me raportet përkatëse.
- **Task 3.4:** Testimi i mundësisë për shtimin dhe ruajtjen e komenteve për raportet e pacientëve.

### 4. Integrimi me pajisje të veshshme (Ulët)
**Si pacient, dua që aplikacioni të lidhet me pajisje të veshshme (si ora inteligjente) që të mbledh automatikisht të dhënat e zemrës.**

#### Tasks:
- **Task 4.1:** Kërkimi dhe analiza e mundësive për integrimin e pajisjeve të veshshme (API-të e mundshme).
- **Task 4.2:** Zhvillimi i logjikës për lidhjen e aplikacionit me pajisjet e veshshme për mbledhjen e të dhënave.
- **Task 4.3:** Testimi i integrimit dhe siguria që të dhënat e zemrës mbledhen automatikisht dhe ruhen në databazë.
- **Task 4.4:** Dokumentimi i procesit të integrimit për përdoruesit dhe mjekët.

## Detyrat e Anëtarëve të Ekipit

### Anila Krasniqi:
- Krijimi i panelit për shfaqjen e të dhënave të kaluara të zemrës (Task 1.1).
- Dizajnimi i ndërfaqes për eksportimin e raporteve shëndetësore (Task 2.1).

### Pënar Kera:
- Zhvillimi i funksionalitetit për eksportimin e të dhënave të zemrës në PDF dhe CSV (Task 2.2).
- Implementimi i mundësisë për lidhjen me pajisjet e veshshme për mbledhjen e të dhënave (Task 4.1, Task 4.2).

### Rinesa Merovci:
- Testimi i funksionalitetit të aksesit në të dhënat e kaluara dhe eksportimit të raporteve (Task 1.4, Task 2.4).
- Dokumentimi i mundësisë për përdorimin e funksionaliteteve nga përdoruesit dhe mjekët (Task 3.4).

### Të gjithë anëtarët:
- Shqyrtimi dhe testimi i funksionaliteteve të implementuara (për të gjitha Tasks).
- Sigurimi i cilësisë dhe dokumentimi për përdoruesit.

## Përkufizimi i Përfundimit (Definition of Done)

- Kodi është i ngarkuar në repository.
- Funksionaliteti punon në një mjedis testimi.
- Të paktën një anëtar tjetër i ekipit ka shqyrtuar kodin.
- Është shkruar dokumentacioni për funksionalitetet e implementuara.
