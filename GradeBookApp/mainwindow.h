#ifndef MAINWINDOW_H
#define MAINWINDOW_H

#include <QMainWindow>
#include <QMessageBox>
#include <QtWidgets>

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
    void onSelectGroupCurrentChanged(const QString &group);
    void onSelectTeacherCurrentChanged(const QString &teacher);
    void onSelectSubjectCurrentChanged(const QString &subject);
    void onSelectLessonCurrentChanged(const QString &lesson);
    void onChangedMark();

private:
    Ui::MainWindow *ui;

    QString _selectedGroup;
    QString _selectedTeacher;
    QString _selectedSubject;
    QString _selectedLesson;

    DbContext* _db;

    QFormLayout* formLayout;
    QComboBox* selectMark;

    QList<QString> _marks;

    QMap<QString, QComboBox*>* _map;
};
#endif // MAINWINDOW_H
