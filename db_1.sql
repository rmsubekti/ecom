create database ecom_18.22.2182;
use ecom_18.22.2182;

CREATE table tbl_admin(
    id_admin int primary key auto_increment,
    username varchar(50) not  null,
    password varchar(50) not null,
    nama varchar(50),
    email varchar(50)
);

create table tbl_kategori(
	id_kategori int primary key auto_increment,
	nama_kategori varchar(50)
);

create table tbl_biaya_kirim(
	id_biaya_kirim int primary key auto_increment,
	kota varchar(50),
	biaya int(10) 
);

create table tbl_merek(
	id_merek int primary key auto_increment,
	nama_merek  varchar(50)
);


create table tbl_member(
	id_member int primary key auto_increment,
	username  varchar(50) not null,
	password varchar(50) not null,
	nama varchar(50) not null,
	alamat varchar(50) not null,
	email varchar(50) not null,
	no_hp varchar(50) not null
);


create table tbl_produk(
	id_produk int primary key auto_increment,
	id_kategori_produk  int not null, 
	id_merek int not null,
	nama_produk varchar(100) not null,
	deskripsi text,
	harga int not null,
	gambar varchar(100),
	slide char(1),
	rekomendasi char(1),
    FOREIGN KEY(id_kategori_produk)  references tbl_kategori(id_kategori),
    foreign key(id_merek)  references tbl_merek(id_merek)
);



create table tbl_order(
	id_order int primary key auto_increment,
	status_order char(1) not null,
	tanggal_order date not null,
	jam_order time not null,
	id_member int not null,
	foreign key(id_member) references tbl_member(id_member)
);



create table tbl_detail_order(
	id_detail_order int primary key auto_increment,
	id_order  int not null,
	id_produk int not null,
	jumlah int not null,
	harga int not null,
	foreign key(id_order) references tbl_order(id_order),
	foreign key(id_produk)  references tbl_produk(id_produk)
	
);




