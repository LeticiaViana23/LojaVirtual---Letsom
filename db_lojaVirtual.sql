create database db_lojavirtual
default character set utf8 
default collate utf8mb3_general_ci;

use db_lojavirtual;

create table tbl_categoria
(	
    cd_categoria int primary key auto_increment,
    ds_categoria varchar(25) not null    
)
default charset utf8;


create table tbl_marca
(	
    cd_marca int primary key auto_increment,
    nm_marca varchar(45) not null    
)
default charset utf8;


create table tbl_instrumento
(	
    cd_instrumento int primary key auto_increment,
    cd_categoria int not null,
    nm_instrumento varchar(70) not null,
    cd_marca int not null,
    no_itens varchar(4) not null,
    vl_preco decimal(6,2) not null,
    qt_estoque int not null,
    ds_resumo text not null,
    ds_instrumento varchar(255) not null,
    sg_lancamento enum('S','N') not null,
    constraint fk_cat foreign key(cd_categoria) references tbl_categoria(cd_categoria),
    constraint fk_marca foreign key(cd_marca) references tbl_marca(cd_marca)
)  
default charset utf8;

insert into tbl_categoria
values(default,'Guitarras'),
(default, 'Violão'),
(default, 'Baterias'),
(default, 'Sopro'),
(default, 'Microfone');


insert into tbl_marca
values(default,'Tagima'),		
(default, 'Giannini'),					
(default, 'Yamaha'),					
(default, 'Fender'),				
(default, 'Ibanez'),				
(default, 'Gretsch'),				
(default, 'Tama'),					
(default, 'Vogga'),			
(default, 'Pearl'),					
(default, 'Ludwig'),				  
(default, 'Gretsch'),				    
(default, 'Eagle'),		
(default, 'Harmonics'),				
(default, 'Shelter'),				   
(default, 'Tivoli'),		
(default, 'Neumann'),				 
(default, 'Shure'),			   
(default, 'Sennheiser');	



insert into tbl_instrumento
values
(Default,'2','Violão Tagima','1','1','390.00','25',
'<p>O violão Tagima é conhecido pela boa qualidade de construção e custo-benefício. Ele costuma ter corpo em madeira laminada
 ou maciça (dependendo do modelo), braço confortável e escala bem acabada, oferecendo boa tocabilidade para iniciantes e músicos
 mais experientes. Os modelos eletroacústicos da Tagima vêm equipados com captação e equalizador, ideais para apresentações ao vivo.
 Além disso, a marca brasileira se destaca pelo design moderno e som equilibrado, que atende bem a diferentes estilos
 musicais.</p>', 'violaoTagima','N'),

(Default,'2','Violão Giannini','2','1','950.00','20',
'<p>O violão Giannini combina tradição e qualidade: corpo em madeira bem selecionada, braço confortável, 
cordas que equilibram brilhância e calor, acabamento bem executado. Ideal para quem busca bom som, durabilidade 
e estilo.</p>', 'violaoGiannini','N'),

(Default,'2','Violão Yamaha','3','1','890.00','15',
'<p>Um violão Yamaha se destaca pela combinação de tradição, precisão na construção e som equilibrado. 
Corpo robusto com madeira de qualidade, braço confortável, ação bem ajustada — resultado: ótimo sustain, 
timbres limpos nos agudos e médios, graves presentes sem embolar. Ideal para quem quer um instrumento confiável 
para prática, apresentações ou gravações</p>', 'violaoYamaha','S');

insert into tbl_instrumento
values
 
 (Default,'1','Guitarra Fender','4','1','1400.00','10',
'<p>A guitarra Fender é reconhecida mundialmente pelo timbre clássico, versatilidade e excelente construção. 
Possui design icônico, braço confortável e captação de alta qualidade, entregando som limpo e encorpado que se 
adapta a diversos estilos musicais. É a escolha de muitos músicos profissionais e apaixonados por autenticidade 
sonora.</p>', 'guitarraFender','N'),
 
 (Default,'1','Guitarra Ibanez','5','1','1160.00','15',
'<p>A guitarra Ibanez é conhecida pelo design moderno, braço fino e confortável, além de captadores potentes que garantem timbre
 versátil e definido. Muito apreciada no rock e no metal, entrega velocidade, precisão e qualidade sonora para diferentes 
 estilos musicais.</p>', 'guitarraIbanez','S'),

 (Default,'1','Guitarra Gretsch','6','1','3000.00','5',
'<p>A guitarra Gretsch é marcada pelo visual vintage e elegante, com corpo semiacústico ou hollow body, captadores de timbre encorpado 
e brilhante. Reconhecida no rockabilly, jazz e blues, oferece som característico, cheio de personalidade 
e presença em palco.</p>', 'guitarraGretsch','N');

insert into tbl_instrumento
values

 (Default,'3','Bateria Tama','7','1','5000.00','7',
'<p>A bateria Tama é reconhecida pela robustez, excelente projeção sonora e acabamento de alto padrão. Oferece timbres potentes e versáteis,
 ideais para shows e estúdios, sendo uma das preferidas de bateristas profissionais no rock, metal e outros 
 estilos.</p>', 'bateriaTama','S'),

 (Default,'3','Bateria Vogga','8','1','2700.00','8',
'<p>A bateria Vogga oferece boa qualidade sonora e construção resistente a um preço acessível. Ideal para iniciantes e músicos intermediários,
 proporciona timbres equilibrados e conforto ao tocar, sendo uma opção prática para estudos e apresentações.</p>', 'bateriaVogga','S'),

 (Default,'3','Bateria Pearl','9','1','7000.00','2',
'<p>A bateria Pearl é conhecida pela durabilidade, som consistente e acabamento de alta qualidade. Oferece timbres potentes e versáteis, sendo 
ideal para músicos de todos os níveis, tanto em ensaios quanto em apresentações ao vivo.</p>', 'bateriaPearl','N'),
 
  (Default,'3','Bateria Ludwig','10','1','9500.00','2',
'<p>A bateria Ludwig é renomada por sua construção sólida, som encorpado e timbres equilibrados. Muito apreciada por bateristas de todos os níveis, 
combina tradição, durabilidade e performance consistente para ensaios, gravações e apresentações ao vivo.</p>', 'bateriaLudwig','N'),
 
 
  (Default,'3','Bateria Gretsch','11','1','9000.00','5',
'<p>A bateria Gretsch é reconhecida pelo som encorpado, timbres quentes e ressonância marcante. Com construção robusta e acabamento refinado, 
é muito apreciada por bateristas profissionais em estúdios e palcos, oferecendo tradição e qualidade 
sonora clássica.</p>', 'bateriaGretsch','N');


insert into tbl_instrumento
values

 (Default,'4','Trompete Eagle','12','1','2009.00','20',
'<p>O trompete Eagle é uma opção acessível e de boa qualidade, ideal para iniciantes e estudantes de música. 
Possui afinação estável, construção resistente e timbre equilibrado, oferecendo praticidade no aprendizado e 
em apresentações.</p>', 'trompeteEagle','S'),

 (Default,'4','Trompete Harmonics','13','1','1000.00','15',
'<p>O trompete Harmonics é indicado para iniciantes e estudantes, oferecendo boa afinação, construção resistente e 
timbre equilibrado. É uma opção acessível para quem busca praticidade e qualidade no aprendizado musical.</p>', 'trompeteHarmonics','N'),

 (Default,'4','Flauta Shelter','14','1','950.00','8',
'<p>A flauta Shelter é uma opção acessível e prática para estudantes de música. Possui construção simples, afinação 
adequada e timbre equilibrado, sendo ideal para quem está iniciando o aprendizado no instrumento.</p>', 'flautaShelter','N'),

 (Default,'4','Saxofone Tivoli','15','1','1790.00','5',
'<p>O saxofone Tivoli é indicado para iniciantes, oferecendo boa relação custo-benefício. Possui afinação estável, timbre agradável e
 construção resistente, sendo uma escolha prática para estudo e primeiros passos na música.</p>', 'saxofoneTivoli','N');
 
insert into tbl_instrumento
values
 
 (Default,'5','Microfone Neumann','16','1','6500.00','15',
'<p>O microfone Neumann é sinônimo de excelência em estúdios profissionais. Com construção premium, oferece captação clara, detalhada 
e natural, garantindo timbres fiéis e qualidade sonora de alto nível para gravações vocais e instrumentais.</p>', 'microfoneNeumann','S'),

 (Default,'5','Microfone Shure','17','1','1590.00','8',
'<p>O microfone Shure é reconhecido mundialmente pela durabilidade, confiabilidade e qualidade de som. Oferece captação clara e versátil, sendo ideal 
para apresentações ao vivo, estúdios e uso profissional em diferentes estilos musicais.</p>', 'microfoneShure','N'),

 (Default,'5','Microfone Sennheiser','18','1','590.00','25',
'<p>O microfone Sennheiser é valorizado pela alta fidelidade sonora, robustez e design moderno. Garante captação clara e precisa,
 sendo uma excelente escolha para estúdios, palcos e produções profissionais.</p>', 'microfoneSennheiser','N');
 
 
select * from tbl_categoria;

DELETE FROM tbl_instrumento
WHERE cd_categoria = 2;

select * from tbl_instrumento;

	
