#include "mainwindow.h"
#include "ui_mainwindow.h"

MainWindow::MainWindow(QWidget *parent)
    : QMainWindow(parent)
    , ui(new Ui::MainWindow)
{
    ui->setupUi(this);

    connect(ui->selectGroup, &QComboBox::currentTextChanged, this, &MainWindow::onSelectGroupCurrentChanged);
    connect(ui->selectTeacher, &QComboBox::currentTextChanged, this, &MainWindow::onSelectTeacherCurrentChanged);
    connect(ui->selectSubject, &QComboBox::currentTextChanged, this, &MainWindow::onSelectSubjectCurrentChanged);
    connect(ui->selectLesson, &QComboBox::currentTextChanged, this, &MainWindow::onSelectLessonCurrentChanged);

    formLayout = new QFormLayout(ui->widgetStudentMarks);

    auto config = new DbConfig("db_config.json");
    _db = new DbContext(config->provider(),
                            config->hostName(),
                            config->dbName(),
                            config->userName(),
                            config->password());

    auto groups = *(_db->getAllGroups());
    auto teachers = *(_db->getAllTeachers());
    _marks = *(_db->getAllMarks());


    ui->selectGroup->addItems(groups);
    ui->selectTeacher->addItems(teachers);

    _map = new QMap<QString, QComboBox*>();
}

MainWindow::~MainWindow()
{
    delete ui;
}

void MainWindow::onSelectGroupCurrentChanged(const QString &group)
{
    _selectedGroup = group;

    auto students = *(_db->getAllStudents(_selectedGroup));

    for (int i = formLayout->rowCount() - 1; i >= 0; --i) {
        formLayout->removeRow(i);
    }
    _map->clear();

    foreach (auto student, students) {
        selectMark = new QComboBox();
        selectMark->addItems(_marks);
        connect(selectMark, &QComboBox::currentTextChanged, this, &MainWindow::onChangedMark);

        _map->insert(student, selectMark);
        formLayout->addRow(student, selectMark);
    }
}

void MainWindow::onSelectTeacherCurrentChanged(const QString &teacher)
{
    _selectedTeacher = teacher;

    auto subjects = *(_db->getAllSubjects(_selectedTeacher));
    ui->selectSubject->addItems(subjects);
}

void MainWindow::onSelectSubjectCurrentChanged(const QString &subject)
{
    _selectedSubject = subject;

    auto lessons = *(_db->getAllLessons(_selectedSubject));
    ui->selectLesson->addItems(lessons);
}

void MainWindow::onSelectLessonCurrentChanged(const QString &lesson)
{
    _selectedLesson = lesson;
}

void MainWindow::onChangedMark() {
    for (auto i = _map->cbegin(), end = _map->cend(); i != end; ++i){
        auto student = i.key();
        auto mark = i.value()->currentText();

        QMessageBox::information(this, "", student + " " + mark);
    }
}
