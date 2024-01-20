#include "dbcontext.h"

DbContext::DbContext(const QString& provider,
                     const QString& server,
                     const QString& databaseName,
                     const QString& userName,
                     const QString& password) {

    _db = new QSqlDatabase(QSqlDatabase::addDatabase(provider));
    _db->setConnectOptions();
    _db->setHostName(server);
    _db->setDatabaseName(databaseName);
    _db->setUserName(userName);
    _db->setPassword(password);
}

DbContext::~DbContext()
{
    delete _db;
}

QList<QString>* DbContext::getAllNames(const QString& sql)
{
    auto groups = new QList<QString>();

    _db->open();
    auto query = new QSqlQuery();
    query->exec(sql);
    while (query->next()) {
        auto name = query->value(0).toString();
        groups->append(name);
    }
    _db->close();

    return groups;
}

QList<QString>* DbContext::getAllGroups() {

    auto sql = "SELECT name FROM table_groups;";
    return getAllNames(sql);
}

QList<QString> *DbContext::getAllTeachers()
{
    auto sql = "SELECT concat_ws(' ', last_name, first_name) FROM view_teachers;";
    return getAllNames(sql);
}

QList<QString> *DbContext::getAllStudents(const QString& groupName)
{
    auto sql = "SELECT concat_ws(' ', last_name, first_name) FROM view_students WHERE group_name = '" + groupName + "';";
    return getAllNames(sql);
}

QList<QString> *DbContext::getAllSubjects(const QString& teacherName)
{
    auto sql = "SELECT subject FROM view_teacher_subjects WHERE teacher_name = '" + teacherName + "';";
    return getAllNames(sql);
}

QList<QString> *DbContext::getAllLessons(const QString& subjectName)
{
    auto sql = "SELECT title FROM view_lessons WHERE subject = '" + subjectName + "';";
    return getAllNames(sql);
}
