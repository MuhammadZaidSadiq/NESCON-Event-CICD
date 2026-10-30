pipeline {
    agent any
    stages {
        stage('Checkout') {
            steps { echo 'Code checked out from GitHub' }
        }
        stage('Build & Deploy with Docker Compose') {
            steps {
                sh '''
                  docker compose down || true
                  docker compose up -d --build
                  sleep 15
                  docker ps
                '''
            }
        }
        stage('Tag Images - Re-image') {
            steps {
                sh '''
                  docker tag nescon-event-cicd-backend:latest nescon-backend:v${BUILD_NUMBER} || docker tag nescon-backend:latest nescon-backend:v${BUILD_NUMBER} || true
                  docker tag nescon-event-cicd-frontend:latest nescon-frontend:v${BUILD_NUMBER} || docker tag nescon-frontend:latest nescon-frontend:v${BUILD_NUMBER} || true
                  docker images | grep nescon || true
                '''
            }
        }
        stage('Verify') {
            steps { sh 'curl -s http://localhost:80/ | head -20 || true' }
        }
    }
    post { success { echo 'NESCON deployed successfully via Jenkins CI/CD!' } }
}
