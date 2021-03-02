/*==============================================================*/
/* DBMS name:      MySQL 5.0                                    */
/* Created on:     25/02/2021 13:32:10                          */
/*==============================================================*/


drop table if exists JABATAN;

drop table if exists KATEGORI;

drop table if exists LOG_AKTIVITAS;

drop table if exists LOG_BARANG;

drop table if exists PEGAWAI;

drop table if exists PRODUK;

drop table if exists STATUSPEGAWAI;

drop table if exists STATUSPRODUK;

/*==============================================================*/
/* Table: JABATAN                                               */
/*==============================================================*/
create table JABATAN
(
   ID_JABATAN           varchar(50) not null,
   KETERANGAN           varchar(50) not null,
   primary key (ID_JABATAN)
);

/*==============================================================*/
/* Table: KATEGORI                                              */
/*==============================================================*/
create table KATEGORI
(
   ID_KATEGORI          smallint not null,
   NAMA_KATEGORI        varchar(50) not null,
   primary key (ID_KATEGORI)
);

/*==============================================================*/
/* Table: LOG_AKTIVITAS                                         */
/*==============================================================*/
create table LOG_AKTIVITAS
(
   WAKTU_LOGIN          datetime not null,
   WAKTU_LOGOUT         datetime not null,
   ID_AKTIVITAS         int not null,
   ID_PEGAWAI           int,
   primary key (ID_AKTIVITAS)
);

/*==============================================================*/
/* Table: LOG_BARANG                                            */
/*==============================================================*/
create table LOG_BARANG
(
   ID_PEGAWAI           int,
   ID_PRODUK            int,
   LOGSTATUS            varchar(255) not null,
   WAKTU                datetime not null,
   JUMLAH               int not null
);

/*==============================================================*/
/* Table: PEGAWAI                                               */
/*==============================================================*/
create table PEGAWAI
(
   ID_PEGAWAI           int not null,
   ID_JABATAN           varchar(50),
   ID_STATUS            varchar(50),
   NAMA_PEGAWAI         varchar(50) not null,
   USERNAME             varchar(50) not null,
   PASSWORD             varchar(50) not null,
   primary key (ID_PEGAWAI)
);

/*==============================================================*/
/* Table: PRODUK                                                */
/*==============================================================*/
create table PRODUK
(
   ID_PRODUK            int not null,
   ID_STATUSPRODUK      smallint,
   ID_KATEGORI          smallint,
   NAMA_PRODUK          varchar(255) not null,
   DESKRIPSI_PRODUK     text not null,
   STOK                 int not null,
   GAMBAR_PRODUK        varchar(255) not null,
   HARGA                float(8,2) not null,
   primary key (ID_PRODUK)
);

/*==============================================================*/
/* Table: STATUSPEGAWAI                                         */
/*==============================================================*/
create table STATUSPEGAWAI
(
   ID_STATUS            varchar(50) not null,
   KETERANGAN           varchar(50) not null,
   primary key (ID_STATUS)
);

/*==============================================================*/
/* Table: STATUSPRODUK                                          */
/*==============================================================*/
create table STATUSPRODUK
(
   ID_STATUSPRODUK      smallint not null,
   KETERANGAN_STATUSPRODUK varchar(50) not null,
   primary key (ID_STATUSPRODUK)
);

alter table LOG_AKTIVITAS add constraint FK_BERAKTIVITAS foreign key (ID_PEGAWAI)
      references PEGAWAI (ID_PEGAWAI) on delete restrict on update restrict;

alter table LOG_BARANG add constraint FK_AKTIVITAS foreign key (ID_PEGAWAI)
      references PEGAWAI (ID_PEGAWAI) on delete restrict on update restrict;

alter table LOG_BARANG add constraint FK_RELATIONSHIP_4 foreign key (ID_PRODUK)
      references PRODUK (ID_PRODUK) on delete restrict on update restrict;

alter table PEGAWAI add constraint FK_BERSTATUS foreign key (ID_STATUS)
      references STATUSPEGAWAI (ID_STATUS) on delete restrict on update restrict;

alter table PEGAWAI add constraint FK_MENJABAT foreign key (ID_JABATAN)
      references JABATAN (ID_JABATAN) on delete restrict on update restrict;

alter table PRODUK add constraint FK_MEMILIKI foreign key (ID_KATEGORI)
      references KATEGORI (ID_KATEGORI) on delete restrict on update restrict;

alter table PRODUK add constraint FK_MEMILIKISTATUS foreign key (ID_STATUSPRODUK)
      references STATUSPRODUK (ID_STATUSPRODUK) on delete restrict on update restrict;

