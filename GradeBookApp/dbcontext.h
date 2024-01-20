#ifndef DBCONTEXT_H
#define DBCONTEXT_H

#include <QtSql>
#include <QList>

class DbContext
{
private:
    QSqlDatabase* _db;

    QList<QString>* getAllNames(const QString& sql);

public:
    DbContext(const QString& provider,
              const QString& server,
              const QString& databaseName,
              const QString& userName,
              const QString& password);
    ~DbContext();

    QList<QString>* getAllGroups();
    QList<QString>* getAllTeachers();
    QList<QString>* getAllStudents(const QString& groupName);
    QList<QString>* getAllSubjects(const QString& teacherName);
    QList<QString>* getAllLessons(const QString& subjectName);
};

#endif // DBCONTEXT_H
