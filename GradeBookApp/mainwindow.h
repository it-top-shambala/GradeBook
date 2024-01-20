#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include <QMessageBox>
#include <QStandardItemModel>

#include "dbcontext.h"
#include "dbconfig.h"

QT_BEGIN_NAMESPACE
namespace Ui {
class MainWindow;
}
QT_END_NAMESPACE

class MainWindow : public QMainWindow
{
    Q_OBJECT

public:
    MainWindow(QWidget *parent = nullptr);
    ~MainWindow();

private slots:
    void on_selectSubject_currentTextChanged(const QString &arg1);

    void on_selectGroup_currentTextChanged(const QString &arg1);

    void on_selectTeacher_currentTextChanged(const QString &arg1);

    void on_selectLesson_currentTextChanged(const QString &arg1);

private:
    Ui::MainWindow *ui;

    QString _selectedGroup;
    QString _selectedTeacher;
    QString _selectedSubject;
    QString _selectedLesson;

    DbContext* _db;

    QStandardItemModel* _model;
};
#endif // MAINWINDOW_H
