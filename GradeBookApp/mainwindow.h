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

signals:
    void signalCurrentMark(const QComboBox *mark, const QString &student);

private slots:
    void onSelectGroupCurrentChanged(const QString &group);
    void onSelectTeacherCurrentChanged(const QString &teacher);
    void onSelectSubjectCurrentChanged(const QString &subject);
    void onSelectLessonCurrentChanged(const QString &lesson);
    void onChangedMark(const QComboBox *mark, const QString &student);

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
};
#endif // MAINWINDOW_H
