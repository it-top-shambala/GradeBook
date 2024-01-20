#include "comboboxitemdelegate.h"
#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);

    auto config = new DbConfig("db_config.json");
    _db = new DbContext(config->provider(),
                            config->hostName(),
                            config->dbName(),
                            config->userName(),
                            config->password());

    auto groups = *(_db->getAllGroups());
    auto teachers = *(_db->getAllTeachers());


    ui->selectGroup->addItems(groups);
    ui->selectTeacher->addItems(teachers);
}

MainWindow::~MainWindow()
{
    delete ui;
}

void MainWindow::on_selectGroup_currentTextChanged(const QString &arg1)
{
    _selectedGroup = arg1;

    auto students = *(_db->getAllStudents(_selectedGroup));

    _model = new QStandardItemModel(students.size(), 2);

    _model->setHeaderData(0, Qt::Horizontal, "Student name");
    _model->setHeaderData(1, Qt::Horizontal, "Mark");

    int row = 0;
    foreach (auto student, students) {
        _model->setItem(row++, 0, new QStandardItem(student));
    }

    QAbstractItemModel *marks = new QStandardItemModel();
    //TODO

    //marks->setData(0, );
    ComboBoxItemDelegate *delegate = new ComboBoxItemDelegate(ui->tableStudentsMarks);
    delegate->setModel(marks);
    delegate->setModelKeyColumn(0);
    delegate->setModelViewColumn(1);

    ui->tableStudentsMarks->setItemDelegateForColumn(1, delegate);

    ui->tableStudentsMarks->setModel(_model);
}

void MainWindow::on_selectTeacher_currentTextChanged(const QString &arg1)
{
    _selectedTeacher = arg1;

    auto subjects = *(_db->getAllSubjects(_selectedTeacher));
    ui->selectSubject->addItems(subjects);
}

void MainWindow::on_selectSubject_currentTextChanged(const QString &arg1)
{
    _selectedSubject = arg1;

    auto lessons = *(_db->getAllLessons(_selectedSubject));
    ui->selectLesson->addItems(lessons);
}

void MainWindow::on_selectLesson_currentTextChanged(const QString &arg1)
{
    _selectedLesson = arg1;
}

