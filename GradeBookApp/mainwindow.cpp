#include "mainwindow.h"
#include "ui_mainwindow.h"

#include "dbcontext.h"

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);

    auto db = new DbContext("localhost", "gradebook_db", "postgres", "1234");
    ui->selectGroup->addItems(db->getAllGroups());
}

MainWindow::~MainWindow()
{
    delete ui;
}
