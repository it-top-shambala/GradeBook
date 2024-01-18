#include "mainwindow.h"
#include "ui_mainwindow.h"

#include "dbcontext.h"
#include "dbconfig.h"

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);

    auto config = new DbConfig("db_config.json");
    auto db = new DbContext(config->provider(),
                            config->hostName(),
                            config->dbName(),
                            config->userName(),
                            config->password());
    ui->selectGroup->addItems(db->getAllGroups());
}

MainWindow::~MainWindow()
{
    delete ui;
}
